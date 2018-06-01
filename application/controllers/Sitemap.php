<?php

	class Sitemap extends CI_Controller {

		public function __construct()
        {
            parent::__construct();
            
            $this->load->helper('general');
			$this->load->model('State_model');
			$this->load->model('City_model');
			$this->load->model('Page_model');
			$this->load->model('Configuration_model');
        }

        public function index() {

        	echo 'sitemap xml';
        }

        public function state_xml() {

			$url = 'http://locksmithub.com/state/';

			$states = $this->State_model->get_states();

			foreach($states as $state) {

				echo htmlspecialchars('<url><loc>'.$url.strtolower($state->abbrev).'</loc></url>').'<br/>';

			}

		}

		public function city_xml($state) {

			$url = 'http://locksmithub.com/city/';

			$states = $this->State_model->get_state_from_abbrev($state);

			if($states != 0) {

				$cities = $this->City_model->get_city_from_state($state);

				if($cities != 0) {

					foreach($cities as $city) {
						echo htmlspecialchars('<url><loc>'.$url.strtolower($city->slug).'</loc></url>').'<br/>';
					}
				} else {

					echo 'No cities available';

				}

			} else {

				echo 'State does\'nt exist.';

			}
		}

		public function zip_xml($state) {

			$url = 'http://locksmithub.com/zip/';

			$states = $this->State_model->get_state_from_abbrev($state);

			if($states != 0) {

				$cities = $this->City_model->get_city_from_state($state);

				if($cities != 0) {

					$zips = array();
					foreach($cities as $city) {
						$zips[] = $city->zip_code;
					}

					$zipcodes = implode($zips, ', ');
					$zipcode = explode(', ', $zipcodes);

					// $zip_codes = array();
					foreach($zipcode as $zip_code) {
						// $zip_codes[] = trim('<a href="'.base_url('zip/'.$zip_code).'" >'.$zip_code.'</a>, ', ', ');
						//sprintf('%05d', $zip_code);
						$zip_codes = '<url><loc>'.$url.sprintf('%05d', $zip_code).'</loc></url>';

						echo htmlspecialchars($zip_codes).'<br/>';
					}


				} else {

					echo 'No zipcpdes available';

				}

			} else {

				echo 'State does\'nt exist.';

			}

			

		}

		public function page_xml() {

			$url = 'http://locksmithub.com/';

			$pages = $this->Page_model->get_active_pages();

			foreach($pages as $page) {

				echo htmlspecialchars('<url><loc>'.$url.$page->slug.'</loc></url>').'<br/>';

			}

		}

		public function post_xml() {

			$url = 'http://locksmithub.com/';

			$posts = $this->Page_model->get_active_posts();

			foreach($posts as $post) {

				echo htmlspecialchars('<url><loc>'.$url.$post->slug.'</loc></url>').'<br/>';

			}

		}

	}