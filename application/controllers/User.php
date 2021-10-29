<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('javascript');

        //get all users
        $this->data['users'] = $this->user_model->getAllUsers();
    }

    public function index()
    {
        if ($this->session->userdata('userusername')) {
            redirect(base_url() . 'user/profile/' . $this->session->userdata('userusername'));
        } else {
            $this->load->view("index");
        }
    }

    public function register()
    {
        $this->load->view('register', $this->data);
    }

    public function navbar()
    {
        $username = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $data['records'] = $this->user_model->fetch_all_service();
        $this->load->view("navbar", $data);
    }


    public function register_data()
    {
        $this->form_validation->set_message('is_unique', 'The %s is already taken.');
        $this->form_validation->set_rules('fname', 'First name', 'required');
        $this->form_validation->set_rules('lname', 'Last name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[30]|is_unique[users.users_username]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.users_email]|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register', $this->data);
        } else {
            $config['allowed_types'] = 'jpg|png';
            $config['upload_path'] = './uploads/';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $acc = $this->input->post('account');

                $name = $this->input->post('fname') . " " . $this->input->post('lname');
                $user_avatar = $this->upload->data('file_name');
                //generate simple random code
                $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $code = substr(str_shuffle($set), 0, 12);
                $user = array(
                    'users_account' => $this->input->post('account'),
                    'users_avatar' => $user_avatar,
                    'users_name' => $name,
                    'users_username' => $this->input->post('username'),
                    'users_birthdate' => $this->input->post('birthdate'),
                    'users_email' => $this->input->post('email'),
                    'users_password' => $this->input->post('password'),
                    'users_code' => $code,
                    'users_active' => false,
                    'users_wallet' => 0
                );

                $id = $this->user_model->insert($user);

                $traineedetails = array(
                    'Age' => $this->input->post('Age'),
                    'Height' => $this->input->post('Height'),
                    'Weight' => $this->input->post('Weight'),
                    'Health' => $this->input->post('Health'),
                    'BMI' => $this->input->post('BMI'),
                    'ID' => $id
                );


                //if trainee ung acc
                if ($acc == "Trainee") {
                    $this->user_model->trainee($traineedetails);
                }
                //if coach ung acc
                else if ($acc == "Coach") {
                    if ($this->upload->do_upload('req')) {
                        $coachdetails = array(
                            'Age' => $this->input->post('Age'),
                            'Requirement' => $this->upload->data('file_name'),
                            'ID' => $id
                        );
                        $this->user_model->coach($coachdetails);
                    }
                }
                
                $message = 	"
                            <html>
                            <head>
                                <title>Verification Code</title>
                            </head>
                            <body>
                                <h2>Thank you for Registering.</h2>
                                <p>Your Account:</p>
                                <p>Email: " . $user['users_email'] . "</p>
                                <p>Please click the link below to activate your account.</p>
                                <h4><a href='" . base_url() . "user/activate/" . $id . "/" . $user['users_code'] . "'>Activate My Account</a></h4>
                            </body>
                            </html>
                            ";


                $this->load->config('email');
                $this->load->library('email');
                $this->email->set_newline("\r\n");
                $this->email->from($config['smtp_user']);
                $this->email->to($user['users_email']);
                $this->email->subject('Signup Verification Email');
                $this->email->message($message);

                //sending email
                if ($this->email->send()) {
                    $this->session->set_flashdata('message', 'Activation code sent to email');
                    $this->session->set_flashdata('username', $user['users_username']);
                    $this->session->set_flashdata('name', $user['users_name']);
                } else {
                    $this->session->set_flashdata('message', $this->email->print_debugger());
                }

                redirect(base_url() . 'user/register');
            }
        }
    }

    public function activate()
    {
        $id =  $this->uri->segment(3);
        $code = $this->uri->segment(4);

        //fetch user details
        $user = $this->user_model->getUser($id);
        print_r($user);

        //if code matches
        if ($user['users_code'] == $code) {
            //update user active status
            $data['users_active'] = true;
            $query = $this->user_model->activate($data, $id);

            if ($query) {
                $this->session->set_flashdata('message', 'User activated successfully');
            } else {
                $this->session->set_flashdata('message', 'Something went wrong in activating account');
            }
        } else {
            $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
        }

        redirect(base_url() . 'user/login');
    }

    public function login()
    {
        if ($this->session->userdata('userusername')) {
            redirect(base_url() . 'user/profile/' . $this->session->userdata('userusername'));
        } else {
            $this->load->view("login");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function login_data()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|callback_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->login();
        } else {
            $check = $this->input->post('username');
            $data["users"] = $this->user_model->fetch_data($check);
            foreach ($data["users"] as $row) {
                if ($row->users_active == 0) {
                    $this->session->set_flashdata('message', 'Account is not activated. Please check your email.');
                    redirect('user/login');
                } else {
                    $this->session->set_userdata('account', $row->users_account);
                    $this->session->set_userdata('userusername', $row->users_username);
                    $this->session->set_userdata('userid', $row->users_id);
                    $this->session->set_userdata('username', $row->users_name);
                    $this->session->set_userdata('link', base_url() . 'user/profile/' . $this->session->userdata('userusername'));
                    $this->session->set_userdata('useravatar', $row->users_avatar);
                    $this->session->set_userdata('role', $row->users_id);
                    redirect(base_url() . 'user/profile/' . $this->session->userdata('userusername'));
                }
            }
        }
    }

    public function profile()
    {
        //$check = $this->session->userdata('userusername');
        $username = $this->uri->segment(3);
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $data["services"] = $this->user_model->get_services($userid);
        $data["trainees"] = $this->user_model->get_trainees($username);
        $data["details"] = $this->user_model->get_traineedetails($userid);
        $data["coachdetails"] = $this->user_model->get_coachdetails($userid);

        $this->navbar();
        $this->load->view("userprofile", $data);
        if (!$this->session->userdata('userusername')) {
            redirect(base_url());
        }
    }

    public function editprofile()
    {
        $username = $this->uri->segment(3);
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $acc = $this->session->userdata('account');
        $data["services"] = $this->user_model->get_services($userid);
        $data["trainees"] = $this->user_model->get_trainees($username);
        $data["details"] = $this->user_model->get_traineedetails($userid);
        $data["coachdetails"] = $this->user_model->get_coachdetails($userid);

        $this->navbar();
        $this->load->view("edit_profile", $data);
    }

    public function bookings()
    {
        $username = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $data["services"] = $this->user_model->fetch_service_by_userid($username);
        $this->navbar();
        $this->load->view("bookings", $data);
    }

    public function validation()
    {
        if ($this->user_model->log_in_correctly()) {
            return true;
        } else {
            $this->form_validation->set_message('validation', 'Incorrect username/password.');
            return false;
        }
    }

    public function update_data()
    {
        $this->form_validation->set_rules('c_pass', 'Password', 'required|callback_password_validation');
        $this->form_validation->set_rules('n_pass', 'New password', 'required|min_length[8]');
        $this->form_validation->set_rules('r_pass', 'Confirm password', 'required|min_length[8]|matches[n_pass]');
        if ($this->form_validation->run() == FALSE) {
            $check = $this->session->userdata('userusername');
            $data["users"] = $this->user_model->fetch_data($check);
            $this->load->view("userprofile", $data);
        } else {
            $data = array(
                'users_username' => $this->session->userdata('userusername'),
                'users_password' => $this->input->post('n_pass')
            );
            $this->user_model->update_data($data);
            $check = $this->session->userdata('userusername');
            $data["users"] = $this->user_model->fetch_data($check);
            $this->session->set_flashdata('message', 'Password has been changed.');
            redirect(base_url() . 'user/profile/' . $this->session->userdata('userusername'));
            //$this->load->view("userprofile", $data);
        }
    }

    public function update_profile()
    {
        //$acc = $this->session->userdata('userusername');
        $acc = $this->session->userdata('account');
        $userid = $this->session->userdata('userid');

        $config['allowed_types'] = 'jpg|png';
        $config['upload_path'] = './uploads/';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

        if ($acc == 'Trainee') {
            $newprofile = array(
                'Age' => $this->input->post('new_age'),
                'Height' => $this->input->post('new_height'),
                'Weight' => $this->input->post('new_weight'),
                'BMI' => $this->input->post('new_bmi'),
                'ID' => $this->session->userdata('userid'),
                'Health' => $this->input->post('new_health')
            );
            $this->user_model->update_traineeprofile($newprofile);
        } else if ($acc == 'Coach') {
            if ($this->upload->do_upload('new_req')) {
                $coach_req = $this->upload->data('file_name');
                $newcoachdetails = array(
                    'Age' => $this->input->post('new_age'),
                    'requirement' => $coach_req,
                    'ID' => $this->session->userdata('userid')
                );
                $this->user_model->update_coachprofile($newcoachdetails); 

            }
            else {
                print_r($acc);
            }
        }
  
        $check = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($check);
        redirect(base_url().'user/profile/'.$this->session->userdata('userusername'));
    }
    public function password_validation()
    {
        if ($this->user_model->password_correct()) {
            return true;
        } else {
            $this->form_validation->set_message('password_validation', 'Current password is not the same with the old password.');
            return false;
        }
    }

    public function marketplace()
    {
        $username = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $data['records'] = $this->user_model->fetch_all_service();
        $data["details"] = $this->user_model->get_traineedetails($userid);
        $this->navbar();
        $this->load->view("marketplace", $data);
    }

    public function add_service()
    {
        $workout_availability_temp = 1;
        $data["users"] = $this->user_model->fetch_data($this->session->userdata('userusername'));
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $service = array(
            'services_title' => $this->input->post('workout_title'),
            'services_price' => $this->input->post('workout_price'),
            'services_description' => $this->input->post('workout_description'),
            'services_type' => $this->input->post('workout_type'),
            'services_availability' => $workout_availability_temp,
            'services_time' => $this->input->post('workout_time'),
            'services_day' => $this->input->post('workout_day'),
            'services_session' => $this->input->post('workout_session'),
            'services_duration' => $this->input->post('workout_duration'),
            'users_name' => $this->session->userdata('username'),
            'users_id' => $userid
        );
        $this->user_model->insert_service($service);
        redirect(base_url() . 'user/profile/' . $this->session->userdata('userusername'));
    }

    public function service()
    {
        $serviceid = $this->uri->segment(3);
        $data["services"] = $this->user_model->get_service_by_id($serviceid);
        $data["ratings"] = $this->user_model->get_rating_by_id($serviceid);
        $data["coach"] = $this->user_model->get_coach_by_service($serviceid);
        //print_r($data);
        $this->navbar();
        $this->load->view("service_details", $data);
    }

    public function submit_review()
    {
        $rating = array(
            'services_id' => $this->uri->segment(3),
            'users_id' => $this->session->userdata('userid'),
            'users_username' => $this->session->userdata('userusername'),
            'ratings_rate' => $this->input->post('rating'),
            'ratings_comment' => $this->input->post('review_comment')
        );
        $this->user_model->insert_rating($rating);
        redirect(base_url() . 'user/service/' . $rating['services_id']);
    }

    public function messages()
    {
        $this->load->view("messages");
    }

    public function topup()
    {
        $this->navbar();
        $this->load->view("topup");
    }

    public function test()
    {
        $username = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $serviceid = $this->uri->segment(3);
        $data["services"] = $this->user_model->get_service_by_id($serviceid);
        $temp = $this->user_model->fetch_all_orders();
        $data["orders"] = end($temp);
        $this->navbar();
        $this->load->view("success_order", $data);
    }

    public function success_order()
    {
        $username = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
            $useremail = $row->users_email;
        }
        $serviceid = $this->uri->segment(3);
        $data["services"] = $this->user_model->get_service_by_id($serviceid);
        foreach ($data["services"] as $row) {
            $serviceprice = $row->services_price;
        }
        $temp = $this->user_model->fetch_all_orders();
        $data["orders"] = end($temp);
        $orderid = $data["orders"]->orders_id;
        $message = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap'
                rel='stylesheet'>
        </head>

        <style>
        * {
            margin: 0;
        }

        html {
            background-color: #222222;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        #header {
            font-weight: 600;
            font-size: 40px;
            color: #FA632A;
            padding-top: 4.5rem;
            padding-bottom: 4rem;
        }


        .infodiv {
            margin: 3rem auto 3rem;
            padding-left: 3rem;
            padding-right: 3rem;
            overflow: hidden;
            width: 50%;
        }

        .market-header {
            font-family: 'Poppins';
            line-height: 0;
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding-left: 3rem;
            padding-right: 3rem;
        }

        .success-img {
            align-items: center;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
        }

        .success-img img {
            max-width: 250px;
        }

        .infoheader {
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #FA632A;
            align-items: center;
            padding: 3rem 0 3rem;
            width: 100%;
        }

        .infohead {
            font-family: 'Poppins';
            color: #ffffff;
            margin-top: 1rem;
        }

        .infotext {
            font-family: 'Poppins';
            color: #FFFFFF;
            text-align: center;
            background-color: #383838;
            padding: 3rem;
            font-size: 20px;
        }

        .service-info {
            align-items: center;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            padding: 1rem;
        }

        .info-row {
            line-height: 2.5;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding: 0 3rem 0 3rem;
        }
        </style>

        <body>
            <div class='market-header'>
                <h1 id='header'>BOOKING SUCCESSFUL</h1>
            </div>
            <div class='infodiv'>
                <div class='infoheader'>
                    <div class='success-img'>
                        <img src='<?php echo base_url('assets/images/success.png') ?>'>
</div>
<div class='infohead'>
    <h1>SUCCESS!</h1>
</div>
</div>
<div class='infotext'>
    <p>An order receipt has been sent to your email!</p>
    <br>
    <?php 
                        echo '<div class='service-info'>';
                            echo '<div class='info-row'>';
                            echo '<p>'.'Payment Type '.'</p>';
                            echo '<p>BeFit Wallet</p>';
                            echo '</div>';
                            echo '<div class='info-row'>';
                            echo '<p>'.'Email '.'</p>';
                            echo '<p>'.$useremail.'</p>';
                            echo '</div>';
                            echo '<div class='info-row'>';
                            echo '<p>'.'Amount Paid '.'</p>';
                            echo '<p>'.$serviceprice.' PHP'.'</p>';
                            echo '</div>';
                            echo '<div class='info-row'>';
                            echo '<p>'.'Transaction ID '.'</p>';
                            echo '<p>BFTWRKT00'.$orderid.'</p>';
                            echo '</div>';
                        echo '</div>';
                    ?>
</div>
</div>
</body>

</html>
";

        $this->load->config('email');
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($useremail);
        $this->email->subject('Booking Receipt');
        $this->email->message($message);

        if ($this->email->send()) {
            $this->session->set_flashdata('message', 'Nice one');
        } else {
            $this->session->set_flashdata('message', $this->email->print_debugger());
        }

        $this->navbar();
        $this->load->view("success_order", $data);
    }





    public function success()
    {
        $data['value'] = $_COOKIE['value'];
        $temp = $this->user_model->get_wallet($this->session->userdata('userid'));
        $newVal = floatval($data['value']) + floatval($temp[0]->users_wallet);
        $this->user_model->success_topup(floatval($newVal));
        $this->user_model->insert_topup($this->session->userdata('userid'), floatval($data['value']));
        unset($_COOKIE['value']);
        redirect(base_url() . 'user/topup');
    }

    public function aboutus()
    {
        $username = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $this->navbar();
        $this->load->view("aboutus", $data);
    }

    public function nutrition()
    {
        $username = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $this->navbar();
        $this->load->view("nutrition", $data);
    }

    public function podcast()
    {
        $username = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $this->navbar();
        $this->load->view("podcast", $data);
    }

    public function faq()
    {
        $this->navbar();
        $this->load->view("faq");
    }

    public function delete_services()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->user_model->delete_services($id);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function checkout()
    {
        $username = $this->session->userdata('userusername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $serviceid = $this->uri->segment(3);
        $data["services"] = $this->user_model->get_service_by_id($serviceid);
        $this->navbar();
        $this->load->view("checkout_service", $data);
    }

    public function avail_service()
    {
        $from = $this->session->userdata('userusername');
        $temp = $this->user_model->get_coach_by_service($this->uri->segment(3));
        $to = $temp[0]->users_username;
        $amount = floatval($temp[0]->services_price);
        $serviceid = $this->uri->segment(3);
        $duration = $temp[0]->services_duration;
        $this->user_model->insert_order($from, $to, $amount, $serviceid, $duration);
        $wallet = $this->user_model->get_wallet($this->session->userdata("userid"));
        $new_wallet = intval($wallet[0]->users_wallet) - intval($amount);
        $this->user_model->update_wallet($new_wallet);
        redirect(base_url() . 'user/success_order/' . $serviceid);
    }

    public function confirm()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sale_id = $this->user_model->get_servicebyorder($id);
            $sale2 = $this->user_model->get_servicesale($sale_id[0]->services_id);
            $temp = intval($sale2[0]->services_sale) + 1;
            $this->user_model->update_servicesale($sale_id[0]->services_id, $temp);
            $this->user_model->confirm_trainee($id);
            redirect($_SERVER['HTTP_REFERER']);
        }

        //$this->user_model->update_services($id);
    }

    public function registercoach_mobile() {
        $result='';
        $user = array(
            'users_account' => $this->input->post('taccount'),
            'users_avatar' => $this->input->post('tshuffledfilename'),
            'users_name' => $this->input->post('tname'),
            'users_username' => $this->input->post('tusername'),
            'users_birthdate' => $this->input->post('tbirthdate'),
            'users_email' => $this->input->post('temail'),
            'users_password' => $this->input->post('tpassword'),
            'users_code' => $this->input->post('tcode'),
            'users_active' => false,
            'users_wallet' => 0
        );
        $id = $this->user_model->insert($user);

        $tdetail = array(
            'Age' => $this->input->post('tage'),
            'Height' => floatval($this->input->post('theight')),
            'Weight' => floatval($this->input->post('tweight')),
            'Health' => $this->input->post('thealth'),
            'ID' => $id,
            'BMI' => floatval($this->input->post('tbmi'))
        );

        $this->user_model->trainee($tdetail);

        $base = $_POST["tencoded"];
        $filename = $_POST["tshuffledfilename"];
        $binary = base64_decode($base);
        header('Content-Type: bitmap; charset=utf-8');
        $file = fopen('./uploads/' . $filename, 'wb');
        fwrite($file, $binary);
        fclose($file);
        $result = "true";
        echo $id;
    }

    public function register_mobile()
    {
        $result = '';
        $user = array(
            'users_account' => $this->input->post('account'),
            'users_avatar' => $this->input->post('shuffledfilename'),
            'users_name' => $this->input->post('name'),
            'users_username' => $this->input->post('username'),
            'users_birthdate' => $this->input->post('birthdate'),
            'users_email' => $this->input->post('email'),
            'users_password' => $this->input->post('password'),
            'users_code' => $this->input->post('code'),
            'users_active' => false,
            'users_wallet' => 0
        );
        $id = $this->user_model->insert($user);

        $detail = array(
            'Age'=>$this->input->post('age'),
            'requirement'=>$this->input->post('shuffledId'),
            'ID'=>$id
        );
        $this->user_model->coach($detail);

        $base = $_POST["encoded"];
        $filename = $_POST["shuffledfilename"];
        $binary = base64_decode($base);
        header('Content-Type: bitmap; charset=utf-8');
        $file = fopen('./uploads/' . $filename, 'wb');
        fwrite($file, $binary);
        fclose($file);
        $baseId = $_POST["encodedId"];
        $filenameId = $_POST["shuffledId"];
        $binaryId = base64_decode($baseId);
        header('Content-Type: bitmap; charset=utf-8');
        $fileId = fopen('./uploads/'.$filenameId, 'wb');
        fwrite($fileId, $binaryId);
        fclose($fileId);
        $result = "true";
        echo $id;
    }

    public function registertrainee_mobile() {
        $result='';
        $user = array(
            'users_account'=>$this->input->post('taccount'),
            'users_avatar'=>$this->input->post('tshuffledfilename'),
            'users_name'=>$this->input->post('tname'),
            'users_username'=>$this->input->post('tusername'),
            'users_birthdate'=>$this->input->post('tbirthdate'),
            'users_email'=>$this->input->post('temail'),
            'users_password'=>$this->input->post('tpassword'),
            'users_code'=>$this->input->post('tcode'),
            'users_active'=>false,
            'users_wallet'=>0
        );
        $id = $this->user_model->insert($user);

        $tdetail = array(
            'Age'=>$this->input->post('tage'),
            'Height'=>floatval($this->input->post('theight')),
            'Weight'=>floatval($this->input->post('tweight')),
            'Health'=>$this->input->post('thealth'),
            'ID'=>$id,
            'BMI'=>floatval($this->input->post('tbmi'))
        );

        $this->user_model->trainee($tdetail);

        $base = $_POST["tencoded"];
        $filename = $_POST["tshuffledfilename"];
        $binary = base64_decode($base);
        header('Content-Type: bitmap; charset=utf-8');
        $file = fopen('./uploads/'.$filename, 'wb');
        fwrite($file, $binary);
        fclose($file);
        $result = "true";
        echo $id;
    }

    public function login_mobile() {
        $result='';
        $name='';
        $id='';
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data["users"] = $this->user_model->fetch_data($username);
        if (!empty($data["users"])) {
            foreach ($data["users"] as $row) {
                if ($password != $row->users_password) {
                    $result = "false";
                } else {
                    if ($row->users_active == 0) {
                        $result = "notactive";
                    } else {
                        $result = "true";
                        $name = $row->users_name;
                        $id = $row->users_id;
                    }
                }
            }
        } else {
            $result = "false";
        }
        
        echo $result.':'.$name.':'.$id;
    }

    public function createWorkout_mobile()
    {
        $result = '';
        $workout_availability_temp = 1;
        $data["users"] = $this->user_model->fetch_data($this->input->post('username'));
        foreach ($data["users"] as $row) {
            $userid = $row->users_id;
        }
        $service = array(
            'services_title' => $this->input->post('workout_title'),
            'services_price' => $this->input->post('workout_price'),
            'services_description' => $this->input->post('workout_description'),
            'services_type' => $this->input->post('workout_type'),
            'services_availability' => $workout_availability_temp,
            'services_time' => $this->input->post('workout_time'),
            'services_day' => $this->input->post('workout_day'),
            'services_session' => $this->input->post('workout_session'),
            'services_duration' => $this->input->post('workout_duration'),
            'users_name' => $this->input->post('name'),
            'users_id' => $userid
        );
        $this->user_model->insert_service($service);
    }

    public function fetchdata_mobile()
    {
        $result = '';
        $account = '';
        $image = '';
        $wallet = '';
        $username = $this->input->post('dataUsername');
        $data["users"] = $this->user_model->fetch_data($username);
        foreach ($data["users"] as $row) {
            $account = $row->users_account;
            $image = $row->users_avatar;
            $wallet = $row->users_wallet;
        }
        $result = "true";
        echo $result . ':' . $account . ':' . $image . ':' . $wallet;
    }

    public function fetchservices_mobile()
    {
        $result = '';
        $title = '';
        $description = '';
        $price = '';
        $coach = '';
        $workout = '';
        $time = '';
        $day = '';
        $duration = '';
        $serviceid = $this->input->post('dataService');
        $data["services"] = $this->user_model->get_service_by_id($serviceid);
        foreach ($data["services"] as $row) {
            $title = $row->services_title;
            $description = $row->services_description;
            $price = $row->services_price;
            $coach = $row->users_name;
            $workout = $row->services_type;
            $time = $row->services_time;
            $day = $row->services_day;
            $duration = $row->services_duration;
        }
        $result = "true";
        echo $result . '<>' . $title . '<>' . $description . '<>' . $price . '<>' . $coach . '<>' . $workout . '<>' . $time . '<>' . $day . '<>' . $duration;
    }

    public function topup_mobile()
    {
        $result = '';
        $amount = $this->input->post('amount');
        $temp = $this->user_model->get_wallet_by_username($this->input->post('dataUsername'));
        $newVal = floatval($amount) + floatval($temp[0]->users_wallet);
        $this->user_model->success_topup_mobile(
            floatval($newVal),
            $this->input->post('dataUsername')
        );
        $this->user_model->insert_topup($temp[0]->users_id, floatval($amount));
        $result = "true";
        echo $result;
    }

    public function submitreview_mobile() {
        $result = '';
        $serviceid = $this->input->post('serviceid');
        $username = $this->input->post('username');
        $rating = $this->input->post('rating');
        $comment = $this->input->post('comment');

        $data["users"] = $this->user_model->fetch_data($username);
        foreach($data["users"] as $row) {
            $userid = $row->users_id;
        }

        $ratingArr = array(
            'services_id'=>$serviceid,
            'users_id'=>$userid,
            'users_username'=>$username,
            'ratings_rate'=>$rating,
            'ratings_comment'=>$comment
        );
        $this->user_model->insert_rating($ratingArr);
        $result = "true";
        echo $result;
    }

    public function removeservice_mobile() {
        $result = '';
        $id = $this->input->post('serviceid');
        $this->user_model->delete_services($id);
        $result = "true";
        echo $result;
    }

    public function confirmtrainee_mobile() {
        $result = '';
        $id = $this->input->post('orderid');
        $sale_id = $this->user_model->get_servicebyorder($id);
        $sale2 = $this->user_model->get_servicesale($sale_id[0]->services_id);
        $temp = intval($sale2[0]->services_sale)+1;
        $this->user_model->update_servicesale($sale_id[0]->services_id,$temp);
		$this->user_model->confirm_trainee($id);

        $result = "true";
        echo $result;
    }

    public function fetchprofile_mobile() {
        $result = '';
        $name = '';
        $account = '';
        $age = '';
        $height = '';
        $weight = '';
        $bmi = '';
        $health = '';
        $image = '';
        $username = $this->input->post('dataUsername');

        $data["users"] = $this->user_model->fetch_data($username);
        foreach($data["users"] as $row) {
            $userid = $row->users_id;
            $name = $row->users_name;
            $account = $row->users_account;
            $image = $row->users_avatar;
        }

        $data["details"] = $this->user_model->get_traineedetails($userid);
        foreach($data["details"] as $row1) {
            $age = $row1->Age;
            $height = $row1->Height;
            $weight = $row1->Weight;
            $bmi = $row1->BMI;
            $health = $row1->Health;
        }

        $result="true";
        echo $result.'<>'.$name.'<>'.$account.'<>'.$age.'<>'.$height.'<>'.$weight.'<>'.$bmi.'<>'.$health.'<>'.$image;
    }
}
