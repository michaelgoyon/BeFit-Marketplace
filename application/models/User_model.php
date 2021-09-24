<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User_model extends CI_Model {
 
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
 
	public function getAllUsers() {
		$query = $this->db->get('users');
		return $query->result();
	}
 
	public function insert($user) {
		$this->db->insert('users', $user);
		return $this->db->insert_id(); 
	}

    public function insert_service($service) {
        $this->db->insert('services', $service);
        return $this->db->insert_id();
    }

    public function insert_rating($rating) {
        $this->db->insert('ratings', $rating);
        return $this->db->insert_id();
    }
 
	public function getUser($id){
		$query = $this->db->get_where('users',array('users_id'=>$id));
		return $query->row_array();
	}

	public function fetch_data($username) {
        $query = $this->db->get_where('users', array('users_username' => $username));
        $result = $query->result();
        return $result;
    }

    public function get_services($userid) {
        $query = $this->db->get_where('services', array('users_id' => $userid));
        $result = $query->result();
        return $result;
    }

    public function get_service_by_id($serviceid) {
        $query = $this->db->get_where('services', array('services_id' => $serviceid));
        $result = $query->result();
        return $result;
    }

    public function get_rating_by_id($serviceid) {
        $query = $this->db->get_where('ratings', array('services_id' => $serviceid));
        $result = $query->result();
        return $result;
    }

    public function fetch_all_service() {
        $query = $this->db->get('services');
		return $query->result();
    }

	public function update_data($data){
        $this->db->update('users', $data, array('users_username' => $data['users_username']));
    }

	public function log_in_correctly() {  
        $this->db->where('users_username', $this->input->post('username'));  
        $this->db->where('users_password', $this->input->post('password'));  
        $query = $this->db->get('users');
  
        if ($query->num_rows() == 1) {  
            return true;  
        } else {  
            return false;  
        }  
    }

	public function password_correct() {  
        $this->db->where('users_username', $this->session->userdata('userusername'));  
        $this->db->where('users_password', $this->input->post('c_pass'));  
        $query = $this->db->get('users');  
        if ($query->num_rows() == 1) {  
            return true;  
        } else {  
            return false;  
        }  
    }  
 
	public function activate($data, $id){
		$this->db->where('users.users_id', $id);
		return $this->db->update('users', $data);
	}

    public function get_wallet($userid) {
        $this->db->select('users_wallet');
        $this->db->from('users');   
        $this->db->where('users_id', $userid);
        return $this->db->get()->result();
    }

    public function success_topup($value) {
        $this->db->set('users_wallet', $value);
        $this->db->where('users_id', $this->session->userdata('userid'));
        $this->db->update('users');
    }

    public function insert_topup($id, $value) {
        $data = array(
            'users_id' => $id,
            'payments_amount' => $value
        );
        $this->db->insert('payments', $data);
    }

    public function insert_order($from, $to, $amount) {
        $data = array(
            'orders_from' => $from,
            'orders_to' => $to,
            'orders_status' => 0,
            'orders_amount' => $amount
        );
        $this->db->insert('orders', $data);
    }
 
}