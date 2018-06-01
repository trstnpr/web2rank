<?php

	class Session_model extends CI_Model {

	    protected $table = 'sessions';
		protected $key = 'id';


	    function __construct()
	    {
	        parent::__construct();
	    }

	    public function create_session_log($data) {

	    	return $this->db->insert($this->table, $data);

	    }


	    
	    

	}