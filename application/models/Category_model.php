<?php

	class Category_model extends CI_Model {

	    protected $table = 'category';
		protected $key = 'id';


	    function __construct()
	    {
	        parent::__construct();
	    }

	    public function get_categories()
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

	    public function add_category($data){

	        return $this->db->insert($this->table, $data);

		}

		public function get_category_from_slug($slug) {
	    	$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('slug', $slug);

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}
	    }

		public function update_category($id, $data) {

			$this->db->where('id', $id);
			
			return $this->db->update($this->table, $data);

		}

		public function delete_category($id) {

			$this->db->where('id', $id);

			return $this->db->delete($this->table);

		}

		public function cat_validate_slug($slug) {
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('slug', $slug);

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}
		}


	}