<?php

	class Page_model extends CI_Model {

	    protected $table = 'pages';
		protected $key = 'id';


	    function __construct()
	    {
	        parent::__construct();
	    }

	    public function get_pages()
	    {

            $this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('layout', 'page');

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}
	    }

	    public function get_page_from_id($id) {

	    	$this->db->select('*');
	    	$this->db->from($this->table);
	    	$this->db->where('id', $id);

	    	$dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}

	    }

	    public function get_page($slug)
	    {
            $this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('slug', $slug);
			$this->db->where('status', 1);

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}
	    }

	    public function get_page_from_slug($slug) {
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

	    public function get_active_pages()
	    {	

            $this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('layout', 'page');
			$this->db->where('status !=', 3);

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}

	    }

	    public function get_trash_pages() {

	    	$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('layout', 'page');
			$this->db->where('status', 3);

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}

	    }

	    public function add_page($data) {

	        return $this->db->insert($this->table, $data);

		}

		public function update_page($id, $data) {

			$this->db->where('id', $id);
			
			return $this->db->update($this->table, $data);

		}

		public function get_posts()
	    {

            $this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('layout', 'post');

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}
	    }

	    public function get_featured_posts($limit=null) {
			$this->db->where('layout', 'post');
			$this->db->where('status', 1);
			$this->db->where('is_featured', 1);
			$this->db->order_by('created_at', 'DESC');
			
			if(isset($limit)) {
				$this->db->limit($limit);
			} else {
				$this->db->limit(3);
			}

            $dataset = $this->db->get($this->table);
			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}
	    }

	    public function get_active_posts()
	    {
            $this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('layout', 'post');
			$this->db->where('status', 1);

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}
	    }

	    public function get_published_post($limit=null, $offset=null) {

	    	$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('layout', 'post');
			$this->db->where('status', 1);
			$this->db->order_by('created_at', 'DESC');
			
			if(isset($limit)) {
				if(isset($offset)) {
					$this->db->limit($limit, $offset);
				} else {
					$this->db->limit($limit);
				}
			} else {
				$this->db->limit(4);
			}

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}

	    }

	    public function get_trash_posts() {

	    	$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('layout', 'post');
			$this->db->where('status', 3);

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}

	    }

		public function add_post($data){

	        return $this->db->insert($this->table, $data);

		}

		public function trash_page_post($id) {

			$data = array('status' => 3);

			$this->db->where('id', $id);

			return $this->db->update($this->table, $data);

		}

		public function delete_page_post($id) {

			$this->db->where('id', $id);

			return $this->db->delete($this->table);

		}

		public function empty_page_post_trash($layout) {

			$this->db->where('status', 3);
			$this->db->where('layout', $layout);
			return $this->db->delete($this->table);

		}

		public function recover_page_post($id) {

			$data = array('status' => 1);

			$this->db->where('id', $id);

			return $this->db->update($this->table, $data);

		}

		public function validate_slug($slug) {
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

		public function get_blog_posts($limit, $offset) {
	        if ($offset > 0) {
	            $offset = ($offset - 1) * $limit;
	        }

	        $this->db->where('layout', 'post');
	        $this->db->where('status', 1);
	        $this->db->order_by('created_at', 'DESC');

	        $result['data'] = $this->db->get($this->table, $limit, $offset);
	        //$result['count'] = $this->db->count_all_results($this->table);

	        return $result;
	    }

	}