<?php

	class User_model extends CI_Model {

	    protected $table = 'users';
		protected $key = 'id';

	    function __construct()
	    {
	        parent::__construct();
	    }

	    public function get_users()
	    {

            $this->db->select('*');
			$this->db->from($this->table);

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}
	    }

	    public function resolve_user_login($user, $password) {

	    	$this->db->select('password');
			$this->db->from($this->table);
			$this->db->where('username', $user);
			$this->db->where('password', $password);

			return $this->db->get()->row();

	    }

	    public function get_user_id_from_username($username) {
		
			$this->db->select('id');
			$this->db->from($this->table);
			$this->db->where('username', $username);

			return $this->db->get()->row('id');
			
		}

		public function get_user($user_id) {
		
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('id', $user_id);

			return $this->db->get()->row();
			
		}

		public function update_user($id, $data) {

			$this->db->where('id', $id);
			
			return $this->db->update($this->table, $data);

		}

		public function match_password($id, $data) {

			$this->db->select('password');
	    	$this->db->from($this->table);
	    	$this->db->where('id', $id);
	    	$this->db->where('password', md5($data));
	    	
	    	$dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}

		}

		public function update_password($id, $data) {

			$this->db->where('id', $id);
			
			return $this->db->update($this->table, $data);

		}

	}