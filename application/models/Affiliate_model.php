<?php

	class Affiliate_model extends CI_Model {

	    protected $table = 'affiliates';
		protected $key = 'id';


	    function __construct()
	    {
	        parent::__construct();
	    }


	    public function get_data_from_email($email)
	    {

            $this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('email', $email);

            $dataset = $this->db->get();

			if($dataset->num_rows()){

				return $dataset->result();

			} else {
				return FALSE;
			}

	    }

	    public function get_data_from_email_name($email, $name) {

	    	$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('email', $email);
			$this->db->where('name', $name);

            $dataset = $this->db->get();

			if($dataset->num_rows()){

				return $dataset->result();

			} else {
				return FALSE;
			}

	    }

	    public function get_data_from_token($token)
	    {

            $this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('token', $token);

            $dataset = $this->db->get();

			if($dataset->num_rows()){

				return $dataset->result();

			} else {
				return FALSE;
			}

	    }

	    public function create_token($data) {

	    	return $this->db->insert($this->table, $data);

	    }



	    

	}