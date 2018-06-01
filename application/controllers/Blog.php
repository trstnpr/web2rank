<?php

	class Blog extends CI_Controller {

		public function __construct()
        {
            parent::__construct();
            
            $this->load->helper('general');
			$this->load->model('Page_model');
			$this->load->model('Configuration_model');
			$this->load->model('Category_model');
			$this->load->helper('url');
			$this->load->library('pagination');
			$this->load->library(array('session'));
            $this->load->helper(array('url'));
            $this->load->helper('session');
			
        }

        public function index($page = 'blog') {
        	if($segment = $this->uri->segment(2,0)) {
        		if($segment == 'all') {
        			$this->_all_blogs();
        		} else {
        			show_404();
        		}
        	} else {
        		$data['slider'] = $this->Page_model->get_published_post(3);
        		$data['featured'] = $this->Page_model->get_featured_posts();
        		$data['other'] = $this->Page_model->get_published_post(4, 3);

				$data['title'] = 'Our Blog | '.the_config('site_name');
				$data['meta_title'] = 'Our Blog | '.the_config('site_name');
				$data['meta_keyword'] = 'Web Design and Development  in Angeles City Pampanga Philippines, Online Marketing Solutions in Angeles City Pampanga, SEO Outsourcing in Pampanga Philippines, Pay Per Click Management in Pampanga Philippines, Virtual Assistance in Angeles City';
				$data['meta_description'] = 'We are an internet marketing company located at 27A Philexcel Business Park, M.A. Roxas Highway, Clark Freeport Zone, Philippines. We offer Digital Marketing, Virtual Assistance, Web Design And Development, Server Management and more.';
				$this->load->view('templates/header', $data);
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');
			}
        }

        public function _all_blogs($page = 'blog-all', $offset = 0) {
			$offset = $this->uri->segment(3, 0);
			//how many blogs will be shown in a page
	        $limit = 4;
	        
	        $post = $this->Page_model->get_active_posts();
	        $data['count'] = ($post) ? count($post) : 0;

	        $result = $this->Page_model->get_blog_posts($limit, $offset);
	        $data['blogs'] = $result['data'];
	        
	        $config = array();
	        $config['base_url'] = site_url('blog/all');
	        $config['total_rows'] = $data['count'];
	        $config['per_page'] = $limit;

	        //which uri segment indicates pagination number
	        $config['uri_segment'] = 3;
	        $config['use_page_numbers'] = TRUE;

	        //max links on a page will be shown
	        $config['num_links'] = 4;

	        //various pagination configuration
	        $config['full_tag_open'] = '<nav><ul class="pager">';

	        $config['prev_tag_open'] = '<li>';
	        $config['prev_link'] = '&laquo;';
	        $config['prev_tag_close'] = '</li>';

	        $config['cur_tag_open'] = '<li class="active"><a href="#"><strong>';
	        $config['cur_tag_close'] = '</strong></a></li>';

	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';

	        $config['next_tag_open'] = '<li>';
	        $config['next_link'] = '&raquo;';
	        $config['next_tag_close'] = '</li>';		        

	        $config['full_tag_close'] = '</ul></nav>';

	        $this->pagination->initialize($config);
	        $data['pagination'] = $this->pagination->create_links();

			// Blog Data
			$blogs = $this->Page_model->get_published_post();
			if($blogs != 0) {
				$data['recent_blogs'] = $blogs;
			} else {
				$data['recent_blogs'] = 0;
			}

			$data['title'] = 'Our Blog | '.the_config('site_name');
			$data['meta_title'] = 'Our Blog | '.the_config('site_name');
			$data['meta_keyword'] = 'Web Design and Development  in Angeles City Pampanga Philippines, Online Marketing Solutions in Angeles City Pampanga, SEO Outsourcing in Pampanga Philippines, Pay Per Click Management in Pampanga Philippines, Virtual Assistance in Angeles City';
			$data['meta_description'] = 'We are an internet marketing company located at 27A Philexcel Business Park, M.A. Roxas Highway, Clark Freeport Zone, Philippines. We offer Digital Marketing, Virtual Assistance, Web Design And Development, Server Management and more.';
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}

    }