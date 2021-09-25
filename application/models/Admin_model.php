<?php
class Admin_Model extends CI_Model {

    function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function getAllUsers(){
		$query = $this->db->get('admins');
		return $query->result(); 
	}

	public function fetch_data($username){
        $query = $this->db->get_where('admins', array('admins_username' => $username));
        $result = $query->result();
        return $result;
    }

    public function get_trainee_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('users', array('users_account'=>"Trainee"));
		return $query->result();
    }

    public function get_coach_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('users', array('users_account'=>"Coach"));
		return $query->result();
    }

    public function log_in_correctly() {  
        $this->db->where('admins_username', $this->input->post('username'));  
        $this->db->where('admins_password', $this->input->post('password'));  
        $query = $this->db->get('admins');
  
        if ($query->num_rows() == 1) {  
            return true;  
        } else {  
            return false;  
        }  
    }

    public function get_ratings() {
        $query = $this->db->get('ratings');
		return $query->result(); 
    }

	public function get_count() {
        return $this->db->count_all('users');
    }

	public function did_delete_row($id)	{
	    $this->db->where('users_id', $id);
	    $this->db->delete('users');
	}
}