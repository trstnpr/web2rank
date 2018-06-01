<?php

	class Admin extends CI_Controller {

		public function __construct() {
            parent::__construct();
            
            $this->load->helper('general');
            $this->load->helper(array('url'));
            $this->load->helper('session');
            $this->load->model('Page_model');
            $this->load->model('User_model');
            $this->load->model('Configuration_model');
            $this->load->model('Category_model');
            $this->load->library(array('session'));
            $this->load->library('upload');

        }

        public function index() {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                header('Location:'.base_url('admin/dashboard'));

            } else {

                header('Location:'.base_url('admin/login'));

            }

        }

        public function login($page = 'login') {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                redirect(base_url('admin/dashboard'));

            } else {

                if(!$this->uri->segment(3)) {

                    if(!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                        show_404();
                    } else {

                        $data['title'] = 'Admin | '.the_config('site_name');
                        $this->load->view('admin/'.$page, $data);
                    }

                } else {
                    $process = $this->uri->segment(3);
                    
                    if($process == 'process') {

                        $request = $this->input->post();
                        $username = $request['username'];
                        $password = md5($request['password']);

                        if($this->User_model->resolve_user_login($username, $password)) {

                            $user_id = $this->User_model->get_user_id_from_username($username);
                            $user    = $this->User_model->get_user($user_id);

                            $_SESSION['user_id'] = (int)$user->id;
                            $_SESSION['username'] = (string)$user->username;
                            $_SESSION['email'] = (string)$user->email;
                            $_SESSION['password'] = (string)$user->password;
                            $_SESSION['is_admin'] = (bool)true;
                            $_SESSION['logged_in'] = (bool)true;

                            $response = json_encode(array('result' => 'success', 'message' => 'Successfully Logged In', 'redirect' => base_url('admin/dashboard')));

                            echo $response;

                        } else {
                            $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something wrong with credentials'));
                            echo $response;
                        }


                    } else {
                        show_404();
                    }
                }

            }
        }

        public function dashboard($page = 'dashboard') {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if(!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                    show_404();
                } else {

                    $data['title'] = 'Dashboard - Admin | '.the_config('site_name');
                    
                    $this->load->view('admin/templates/header', $data);
                    $this->load->view('admin/'.$page, $data);
                    $this->load->view('admin/templates/footer', $data);
                }

            } else {
                redirect(base_url());
            }

        }

        public function pages($string = '') {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if(empty($string)) {

                    $page = 'pages';
                    if(!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                        show_404();
                    } else {

                        $data['title'] = 'Pages - Admin | '.the_config('site_name');

                        $pages = $this->Page_model->get_active_pages();

                        if($pages != 0) {
                            $data['pages'] = $pages;
                        } else {
                            $data['pages'] = 0;
                        }
                        
                        $this->load->view('admin/templates/header', $data);
                        $this->load->view('admin/'.$page, $data);
                        $this->load->view('admin/templates/footer', $data);
                    }

                } else {

                    if($string == 'trash') {

                        $page = 'trash_pages';
                        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                            show_404();
                        } else {

                            $data['title'] = 'Trash Pages - Admin | '.the_config('site_name');

                            $pages = $this->Page_model->get_trash_pages();

                            // dump($pages);
                            // exit;

                            if($pages != 0) {
                                $data['pages'] = $pages;
                            } else {
                                $data['pages'] = 0;
                            }
                            
                            $this->load->view('admin/templates/header', $data);
                            $this->load->view('admin/'.$page, $data);
                            $this->load->view('admin/templates/footer', $data);
                        }

                    } else {

                        redirect(base_url('admin/pages'));

                    }

                }

            } else {
                redirect(base_url());
            }
        }

        public function page($string) {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if($string == 'new') { // READ HERE publish(1) & draft(2) list
                    $page = 'add_page';
                    if(!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                        show_404();
                    } else {

                        $data['title'] = 'Add New Page - Admin | '.the_config('site_name');
                        
                        $this->load->view('admin/templates/header', $data);
                        $this->load->view('admin/'.$page, $data);
                        $this->load->view('admin/templates/footer', $data);
                    }
                } else if($string == 'add') { // POST HERE

                    if($this->input->post()) {

                        $req = $this->input->post();

                        if(!empty($_FILES['featured_image']['name'])) {
                            $date = date('Y');
                            $path = APPPATH.'../uploads/images/page/';
                            if(!file_exists($path.$date)) {
                                mkdir($path.$date, 0777, true);
                            }

                            $config['upload_path'] = 'uploads/images/page/'.$date.'/';
                            $config['allowed_types'] = 'jpg|jpeg|png';
                            $config['file_name'] = $_FILES['featured_image']['name'];
                            
                            //Load upload library and initialize configuration
                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);
                            
                            if($this->upload->do_upload('featured_image')){
                                $uploadData = $this->upload->data();
                                $featured_image = $uploadData['file_name'];
                                $photo_dir = $config['upload_path'].$featured_image;
                            } else {
                                // $featured_image = NULL;
                                $photo_dir = NULL;
                            }
                        } else {
                            // $featured_image = NULL;
                            $photo_dir = NULL;
                        }

                        $data = array(
                                'title' => $req['title'],
                                'slug' => slugify($req['slug']),
                                'content' => $req['content'],
                                'excerpt' => $req['excerpt'],
                                'layout' => $req['layout'],
                                'meta_keyword' => $req['meta_keyword'],
                                'meta_description' => $req['meta_description'],
                                // 'featured_image' => $config['upload_path'].$featured_image,
                                'featured_image' => $photo_dir,
                                'author' => $_SESSION['username'],
                                'status' => $req['status'],
                                'created_at' => datetime_now()
                            );

                        $put_data = $this->Page_model->add_page($data);

                        if($put_data == 1) {
                            $response = json_encode(array('result' => 'success', 'message' => 'Successfully Posted', 'redirect' => base_url('admin/pages')));
                        } else {
                            $response = json_encode(array('result' => 'error', 'message' => 'Oops! Please try again later.'));
                        }

                        echo $response;
                    } else {
                        redirect(base_url('admin/pages'));
                    }

                } else {
                    redirect(base_url('admin/pages'));
                }

            } else {
                redirect(base_url());
            }

        }

        public function page_update($page = 'update_page') {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                $slug_uri = $this->uri->segment(4, 0);

                $res = $this->Page_model->get_page_from_slug($slug_uri);

                if($res != 0) {
                    $data['page'] = $res[0];
                } else {
                    redirect(base_url('admin/pages'));
                }

                $data['title'] = 'Update Page - Admin | '.the_config('site_name');

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('admin/templates/footer', $data);

            } else {

                redirect(base_url());

            }

        }

        public function page_update_process() {
            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if($this->input->post()) {

                    $req = $this->input->post();
                    $current_img = ($this->input->post('current_img')) ? $this->input->post('current_img') : NULL;
                    $current_status = ($this->input->post('current_status')) ? $this->input->post('current_status') : NULL;

                    if(!empty($_FILES['featured_image']['name'])) {
                        $date = date('Y');
                        $path = APPPATH.'../uploads/images/page/';
                        if(!file_exists($path.$date)) {
                            mkdir($path.$date, 0777, true);
                        }

                        $config['upload_path'] = 'uploads/images/page/'.$date.'/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['file_name'] = $_FILES['featured_image']['name'];
                        
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        
                        if($this->upload->do_upload('featured_image')){

                            if($current_img != NULL) {
                                if(file_exists($current_img)) {
                                    unlink($current_img);
                                }
                            }

                            $uploadData = $this->upload->data();
                            $featured_image = $uploadData['file_name'];
                            $photo_dir = $config['upload_path'].$featured_image;
                        } else {
                            $photo_dir = NULL;
                        }
                    } else {
                        if($current_img != NULL) {
                            $photo_dir = $current_img;
                        } else {
                            if(file_exists($current_status)) {
                                unlink($current_status);
                            }
                            $photo_dir = NULL;
                        }
                    }

                    $id = $req['id'];
                    $data = array(
                            'title' => $req['title'],
                            'slug' => slugify($req['slug']),
                            'content' => $req['content'],
                            'excerpt' => $req['excerpt'],
                            'layout' => $req['layout'],
                            'meta_keyword' => $req['meta_keyword'],
                            'meta_description' => $req['meta_description'],
                            'featured_image' => $photo_dir,
                            'author' => $_SESSION['username'],
                            'status' => $req['status'],
                            'updated_at' => datetime_now()
                        );

                    $res = $this->Page_model->update_page($id, $data);

                   if($res != 0) {
                        $response = json_encode(array('result' => 'success', 'message' => 'Successfully Updated', 'data' => $data['slug']));
                   } else {
                        $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something went wrong.'));
                   }

                   echo $response;

                } else {
                    redirect(base_url());
                }

            } else {
                redirect(base_url());
            }
        }

        public function posts($string = '') {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if(empty($string)) {

                    $page = 'posts';
                    if(!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                        show_404();
                    } else {

                        $data['title'] = 'Posts - Admin | '.the_config('site_name');

                        $posts = $this->Page_model->get_active_posts();

                        if($posts != 0) {
                            $data['posts'] = $posts;
                        } else {
                            $data['posts'] = 0;
                        }
                        
                        $this->load->view('admin/templates/header', $data);
                        $this->load->view('admin/'.$page, $data);
                        $this->load->view('admin/templates/footer', $data);
                    }

                } else {

                    if($string == 'trash') {

                        $page = 'trash_posts';
                        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                            show_404();
                        } else {

                            $data['title'] = 'Trash Posts - Admin | '.the_config('site_name');

                            $pages = $this->Page_model->get_trash_posts();

                            // dump($pages);
                            // exit;

                            if($pages != 0) {
                                $data['pages'] = $pages;
                            } else {
                                $data['pages'] = 0;
                            }
                            
                            $this->load->view('admin/templates/header', $data);
                            $this->load->view('admin/'.$page, $data);
                            $this->load->view('admin/templates/footer', $data);
                        }

                    } else {

                        redirect(base_url('admin/pages'));

                    }

                }

            } else {
                redirect(base_url());
            }
        }

        public function post($string) {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if($string == 'new') {
                    $page = 'add_post';
                    if(!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                        show_404();
                    } else {

                        $data['title'] = 'Add New Post - Admin | '.the_config('site_name');

                        $data['category'] = $this->Category_model->get_categories();

                        $this->load->view('admin/templates/header', $data);
                        $this->load->view('admin/'.$page, $data);
                        $this->load->view('admin/templates/footer', $data);
                    }

                } else if($string == 'add') { // POST HERE

                    if($this->input->post()) {

                        $req = $this->input->post();
                        if(!empty($_FILES['featured_image']['name'])) {
                            $date = date('Y');
                            $path = APPPATH.'../uploads/images/page/';
                            if(!file_exists($path.$date)) {
                                mkdir($path.$date, 0777, true);
                            }

                            $config['upload_path'] = 'uploads/images/page/'.$date.'/';
                            $config['allowed_types'] = 'jpg|jpeg|png';
                            $config['file_name'] = $_FILES['featured_image']['name'];
                            
                            //Load upload library and initialize configuration
                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);
                            
                            if($this->upload->do_upload('featured_image')){
                                $uploadData = $this->upload->data();
                                $featured_image = $uploadData['file_name'];
                                $photo_dir = $config['upload_path'].$featured_image;
                            } else {
                                $photo_dir = NULL;
                            }
                        } else {
                            $photo_dir = NULL;
                        }

                        $category = ($this->input->post('category')) ? $this->input->post('category') : array('Uncategorized');

                        $data = array(
                                'title' => $req['title'],
                                'slug' => slugify($req['slug']),
                                'content' => $req['content'],
                                'excerpt' => $req['excerpt'],
                                'layout' => $req['layout'],
                                'meta_keyword' => $req['meta_keyword'],
                                'meta_description' => $req['meta_description'],
                                'category' => serialize($category),
                                'tag' => $req['tag'],
                                'featured_image' => $photo_dir,
                                'is_featured' => ($this->input->post('is_featured')) ? $this->input->post('is_featured') : 0,
                                'author' => $_SESSION['username'],
                                'status' => $req['status'],
                                'created_at' => datetime_now()
                            );

                        $put_data = $this->Page_model->add_post($data);

                        if($put_data == 1) {
                            $response = json_encode(array('result' => 'success', 'message' => 'Successfully Posted', 'redirect' => base_url('admin/posts')));
                        } else {
                            $response = json_encode(array('result' => 'error', 'message' => 'Oops! Please try again later.'));
                        }

                        echo $response;

                    } else {
                        redirect(base_url('admin/posts'));
                    }

                } else {
                    redirect(base_url('admin/posts'));
                }

            } else {
                redirect(base_url());
            }

        }

        public function post_update($page = 'update_post') {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                $slug_uri = $this->uri->segment(4, 0);

                $data['category'] = $this->Category_model->get_categories();

                $res = $this->Page_model->get_page_from_slug($slug_uri);

                if($res != 0) {
                    $data['post'] = $res[0];
                } else {
                    redirect(base_url('admin/pages'));
                }

                $data['title'] = 'Update Post - Admin | '.the_config('site_name');

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('admin/templates/footer', $data);

            } else {

                redirect(base_url());

            }

        }

        public function post_update_process() {
            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if($this->input->post()) {

                    $req = $this->input->post();
                    $current_img = ($this->input->post('current_img')) ? $this->input->post('current_img') : NULL;
                    $current_status = ($this->input->post('current_status')) ? $this->input->post('current_status') : NULL;
                    $category = ($this->input->post('category')) ? $this->input->post('category') : array('Uncategorized');

                    if(!empty($_FILES['featured_image']['name'])) {
                        $date = date('Y');
                        $path = APPPATH.'../uploads/images/page/';
                        if(!file_exists($path.$date)) {
                            mkdir($path.$date, 0777, true);
                        }

                        $config['upload_path'] = 'uploads/images/page/'.$date.'/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['file_name'] = $_FILES['featured_image']['name'];
                        
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        
                        if($this->upload->do_upload('featured_image')){

                            if($current_img != NULL) {
                                if(file_exists($current_img)) {
                                    unlink($current_img);
                                }
                            }

                            $uploadData = $this->upload->data();
                            $featured_image = $uploadData['file_name'];
                            $photo_dir = $config['upload_path'].$featured_image;
                        } else {
                            $photo_dir = NULL;
                        }
                    } else {
                        if($current_img != NULL) {
                            $photo_dir = $current_img;
                        } else {
                            if(file_exists($current_status)) {
                                unlink($current_status);
                            }
                            $photo_dir = NULL;
                        }
                    }

                    $id = $req['id'];
                    $data = array(
                            'title' => $req['title'],
                            'slug' => slugify($req['slug']),
                            'content' => $req['content'],
                            'excerpt' => $req['excerpt'],
                            'layout' => $req['layout'],
                            'meta_keyword' => $req['meta_keyword'],
                            'meta_description' => $req['meta_description'],
                            'category' => serialize($category),
                            'tag' => $req['tag'],
                            'featured_image' => $photo_dir,
                            'is_featured' => ($this->input->post('is_featured')) ? $this->input->post('is_featured') : 0,
                            'author' => $_SESSION['username'],
                            'status' => $req['status'],
                            'updated_at' => datetime_now()
                        );

                    $res = $this->Page_model->update_page($id, $data);

                   if($res != 0) {
                        $response = json_encode(array('result' => 'success', 'message' => 'Successfully Updated', 'data' => $data['slug']));
                   } else {
                        $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something went wrong.'));
                   }

                   echo $response;

                } else {
                    redirect(base_url());
                }

            } else {
                redirect(base_url());
            }
        }

        public function trash_page_post() {

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

                if($this->input->post()) {
                    
                    $req = $this->input->post();

                    $id = $req['id'];

                    $trash = $this->Page_model->trash_page_post($id);

                    if($trash != 0) {

                        $response = json_encode(array('result' => 'success', 'message' => 'Transferred to trash'));

                   } else {

                        $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something went wrong.'));

                   }

                   echo $response;

                } else {

                    redirect(base_url());
                }

            } else {

                redirect(base_url());
            }

        }

        public function recover_page_post() {

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

                if($this->input->post()) {
                    
                    $req = $this->input->post();

                    $id = $req['id'];

                    $trash = $this->Page_model->recover_page_post($id);

                    if($trash != 0) {

                        $response = json_encode(array('result' => 'success', 'message' => 'Successfully Recovered'));

                   } else {

                        $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something went wrong.'));

                   }

                   echo $response;

                } else {

                    redirect(base_url());
                }

            } else {

                redirect(base_url());
            }

        }

        public function delete_page_post() {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if($this->input->post()) {
                    
                    $req = $this->input->post();

                    $id = $req['id'];

                    $entry = $this->Page_model->get_page_from_id($id);

                    $photo = $entry[0]->featured_image;

                    if($photo != NULL) {
                        if(file_exists($photo)) {
                            unlink($photo);
                        }
                    }

                    $trash = $this->Page_model->delete_page_post($id);

                    if($trash != 0) {

                        $response = json_encode(array('result' => 'success', 'message' => 'Successfully Deleted'));

                   } else {

                        $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something went wrong.'));

                   }

                   echo $response;

                } else {

                    redirect(base_url());
                }

            } else {
                redirect(base_url());
            }

        }

        public function empty_page_post_trash() {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if($this->input->post()) {
                    
                    $req = $this->input->post();

                    $type = $req['type'];

                    $empty = $this->Page_model->empty_page_post_trash($type);

                    if($empty != 0) {

                        $response = json_encode(array('result' => 'success', 'message' => 'Trash is now Empty'));

                   } else {

                        $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something went wrong.'));

                   }

                   echo $response;

                } else {

                    redirect(base_url());
                }

            } else {

                redirect(base_url());

            }

        }

        public function category($string = '') {
            
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

                if($string != NULL) {

                    if($string == 'add') {

                        if($this->input->post()) {

                            $req = $this->input->post();

                            $data = array(
                                'name' => $req['name'],
                                'slug' => slugify($req['slug']),
                                'description' => $req['description']
                                );

                            $put_data = $this->Category_model->add_category($data);

                            if($put_data == 1) {
                                $response = json_encode(array('result' => 'success', 'message' => 'Successfully Posted', 'redirect' => base_url('admin/category')));
                            } else {
                                $response = json_encode(array('result' => 'error', 'message' => 'Oops! Please try again later.'));
                            }

                            echo $response;

                        } else {

                            redirect(base_url('admin/dashboard'));

                        }

                    }

                } else {

                    $page = 'category';
                    if(!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                        show_404();
                    } else {

                        $data['title'] = 'Category - Admin | '.the_config('site_name');

                        $data['categories'] = $this->Category_model->get_categories();
                        
                        $this->load->view('admin/templates/header', $data);
                        $this->load->view('admin/'.$page, $data);
                        $this->load->view('admin/templates/footer', $data);
                    }
                }

            } else {

                redirect(base_url());
            }

        }

        public function delete_category() {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if($this->input->post()) {
                    
                    $req = $this->input->post();

                    $id = $req['id'];

                    $trash = $this->Category_model->delete_category($id);

                    if($trash != 0) {

                        $response = json_encode(array('result' => 'success', 'message' => 'Successfully Deleted'));

                   } else {

                        $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something went wrong.'));

                   }

                   echo $response;

                } else {

                    redirect(base_url());
                }

            } else {
                redirect(base_url());
            }

        }

        public function category_update($page = 'update_category') {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                $slug_uri = $this->uri->segment(4, 0);

                $data['categories'] = $this->Category_model->get_categories();

                $res = $this->Category_model->get_category_from_slug($slug_uri);

                if($res != 0) {
                    $data['cat'] = $res[0];
                } else {
                    redirect(base_url('admin/dashboard'));
                }

                $data['title'] = 'Update Category - Admin | '.the_config('site_name');

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('admin/templates/footer', $data);

            } else {

                redirect(base_url());

            }

        }

        public function category_update_process() {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {

                if($this->input->post()) {

                    $req = $this->input->post();

                    $id = $req['id'];
                    $data = array(
                            'name' => $req['name'],
                            'slug' => slugify($req['slug']),
                            'description' => $req['description'],
                            'updated_at' => datetime_now()
                        );

                    $res = $this->Category_model->update_category($id, $data);

                    if($res != 0) {

                        $response = json_encode(array('result' => 'success', 'message' => 'Successfully Updated', 'data' => $data['slug'], 'redirect' => base_url('admin/category')));

                    } else {

                        $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something went wrong.'));

                    }

                   echo $response;

                } else {
                    redirect(base_url());
                }

            } else {
                redirect(base_url());
            }

        }

        public function logout() {
            
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

                unset(
                    $_SESSION['user_id'],
                    $_SESSION['username'],
                    $_SESSION['email'],
                    $_SESSION['password'],
                    $_SESSION['is_admin'],
                    $_SESSION['logged_in']
                );
                
                redirect(base_url('admin'));
                
            } else {
                
                redirect(base_url());
                
            }
            
        }

        public function validateslug() {

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

                if($this->input->get()) {

                    if($this->input->get('type') == 'page' OR $this->input->get('type') == 'post') {

                        $req = array(
                            'slug' => $this->input->get('slug'),
                            'layout' => $this->input->get('type')
                            );

                        $result = $this->Page_model->validate_slug($req['slug']);

                        if($result == 0) {
                            $slug = slugify($req['slug']);
                            $response = json_encode(array('result' => 'success', 'message' => 'Slug Available', 'data' => $slug));
                        } else {
                            $slug = slugify($req['slug'].'-'.strtotime('now'));
                            $response = json_encode(array('result' => 'success', 'message' => 'New Slug', 'data' => $slug));
                        }

                        echo $response;

                    } else if($this->input->get('type') == 'category') {

                        $req = array(
                            'slug' => $this->input->get('slug')
                            );

                        $result = $this->Category_model->cat_validate_slug($req['slug']);

                        if($result == 0) {
                            $slug = slugify($req['slug']);
                            $response = json_encode(array('result' => 'success', 'message' => 'Slug Available', 'data' => $slug));
                        } else {
                            $slug = slugify($req['slug'].'-'.strtotime('now'));
                            $response = json_encode(array('result' => 'success', 'message' => 'New Slug', 'data' => $slug));
                        }

                        echo $response;

                    } else if($this->input->get('type') == 'state') {

                        $req = array(
                            'slug' => $this->input->get('slug')
                            );

                        $result = $this->State_model->state_validate_slug($req['slug']);

                        if($result == 0) {
                            $slug = slugify($req['slug']);
                            $response = json_encode(array('result' => 'success', 'message' => 'Slug Available', 'data' => $slug));
                        } else {
                            $slug = slugify($req['slug'].'-'.strtotime('now'));
                            $response = json_encode(array('result' => 'success', 'message' => 'New Slug', 'data' => $slug));
                        }

                        echo $response;

                    } else if($this->input->get('type') == 'city') {

                        $req = array(
                            'slug' => $this->input->get('slug')
                            );

                        $result = $this->City_model->get_city_from_slug($req['slug']);

                        if($result == 0) {
                            $slug = slugify($req['slug']);
                            $response = json_encode(array('result' => 'success', 'message' => 'Slug Available', 'data' => $req['slug']));
                        } else {
                            $slug = slugify($req['slug'].'-'.strtotime('now'));
                            $response = json_encode(array('result' => 'success', 'message' => 'New Slug', 'data' => $slug));
                        }

                        echo $response;

                    } else {
                        redirect(base_url('admin/dashboard'));
                    }

                } else {
                    redirect(base_url('admin/dashboard'));
                }
                
            } else {
                
                redirect(base_url());
                
            }

        }

        public function validatenewslug() {

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

                if($this->input->get()) {

                    if($this->input->get('type') == 'page' OR $this->input->get('type') == 'post') {

                        $req = array(
                            'slug' => $this->input->get('slug'),
                            'permalink' => $this->input->get('permalink'),
                            'layout' => $this->input->get('type')
                            );

                        if($req['slug'] != $req['permalink']) {

                            $result = $this->Page_model->validate_slug($req['slug']);

                            if($result == 0) {
                                $slug = slugify($req['slug']);
                                $response = json_encode(array('result' => 'success', 'message' => 'Slug Available', 'data' => $slug));
                            } else {
                                $slug = slugify($req['slug'].'-'.strtotime('now'));
                                $response = json_encode(array('result' => 'success', 'message' => 'New Slug', 'data' => $slug));
                            }

                        } else {
                            $response = json_encode(array('result' => 'success', 'message' => 'No Change', 'data' => $req['permalink']));
                        }

                        echo $response;

                    } else if($this->input->get('type') == 'category') {

                        $req = array(
                            'slug' => $this->input->get('slug'),
                            'permalink' => $this->input->get('permalink')
                            );

                        if($req['slug'] != $req['permalink']) {

                            $result = $this->Category_model->cat_validate_slug($req['slug']);

                            if($result == 0) {
                                $slug = slugify($req['slug']);
                                $response = json_encode(array('result' => 'success', 'message' => 'Slug Available', 'data' => $slug));
                            } else {
                                $slug = slugify($req['slug'].'-'.strtotime('now'));
                                $response = json_encode(array('result' => 'success', 'message' => 'New Slug', 'data' => $slug));
                            }

                        } else {
                            $response = json_encode(array('result' => 'success', 'message' => 'No Change', 'data' => $req['permalink']));
                        }

                        echo $response;

                    } else if($this->input->get('type') == 'state') {

                        $req = array(
                            'slug' => $this->input->get('slug'),
                            'permalink' => $this->input->get('permalink')
                            );

                        if($req['slug'] != $req['permalink']) {

                            $result = $this->State_model->state_validate_slug($req['slug']);

                            if($result == 0) {
                                $slug = slugify($req['slug']);
                                $response = json_encode(array('result' => 'success', 'message' => 'Slug Available', 'data' => $slug));
                            } else {
                                $slug = slugify($req['slug'].'-'.strtotime('now'));
                                $response = json_encode(array('result' => 'success', 'message' => 'New Slug', 'data' => $slug));
                            }

                        } else {
                            $response = json_encode(array('result' => 'success', 'message' => 'No Change', 'data' => $req['permalink']));
                        }

                        echo $response;

                    } else if($this->input->get('type') == 'city') {

                        $req = array(
                            'slug' => $this->input->get('slug'),
                            'permalink' => $this->input->get('permalink')
                            );

                        if($req['slug'] != $req['permalink']) {

                            $result = $this->City_model->city_validate_slug($req['slug']);

                            if($result == 0) {
                                $slug = slugify($req['slug']);
                                $response = json_encode(array('result' => 'success', 'message' => 'Slug Available', 'data' => $slug));
                            } else {
                                $slug = slugify($req['slug'].'-'.strtotime('now'));
                                $response = json_encode(array('result' => 'success', 'message' => 'New Slug', 'data' => $slug));
                            }

                        } else {
                            $response = json_encode(array('result' => 'success', 'message' => 'No Change', 'data' => $req['permalink']));
                        }

                        echo $response;

                    } else {
                        redirect(base_url('admin/dashboard'));
                    }

                } else {
                    redirect(base_url('admin/dashboard'));
                }
                
            } else {
                
                redirect(base_url());
                
            }
        }

        public function configuration($page = 'configuration') {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {
                
                $data['title'] = 'Configurations - Admin | '.the_config('site_name');

                $data['config'] = $this->Configuration_model->get_config();

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('admin/templates/footer', $data);
                
            } else {
                
                redirect(base_url());
                
            }

        }

        public function config_update() {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {
                
                if($this->input->post()) {

                    $config = $this->input->post('config');
                    $config_reponse = array();
                    foreach($config as $key => $conf) {
                        $config_response[] = $this->Configuration_model->set_config($key, $conf[0]);
                    }

                    if($config_response) {
                        $response = json_encode(array('result' => 'success', 'message' => 'Successfully Updated'));
                    } else {
                        $response = json_encode(array('result' => 'error', 'message' => 'Something went wrong'));
                    }

                    echo $response;

                } else {
                    redirect(base_url('admin/configuration'));
                }
                
            } else {
                
                redirect(base_url());
                
            }

        }

        public function user($page = 'user') {

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                
                $data['title'] = 'User Account - Admin | '.the_config('site_name');

                $data['user'] = $this->User_model->get_user($_SESSION['user_id']);

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('admin/templates/footer', $data);
                
            } else {
                
                redirect(base_url());
                
            }

        }

        public function user_detail_update() {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {
                
                if($this->input->post()) {

                    $data = $this->input->post();
                    $id = $_SESSION['user_id'];

                    $res = $this->User_model->update_user($id, $data);

                    if($res != 0) {

                        $response = json_encode(array('result' => 'success', 'message' => 'Successfully Updated'));

                    } else {

                        $response = json_encode(array('result' => 'error', 'message' => 'Oops! Something went wrong.'));

                    }

                   echo $response;

                } else {
                    redirect(base_url('admin/configuration'));
                }
                
            } else {
                
                redirect(base_url());
                
            }

        }
        public function user_password_update() {

            if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] === true) {
                
                if($this->input->post()) {

                    $req = $this->input->post();
                    $id = $_SESSION['user_id'];

                    $match_pass = $this->User_model->match_password($id, $req['password']);

                    if($match_pass) {

                        if($req['new_pass'] == $req['conf_pass']) {
                           
                            if($req['password'] == $req['new_pass']) {
                                $response = json_encode(array('result' => 'success', 'message' => 'Password changed!', 'redirect' => base_url('admin/logout')));
                            } else {
                                $data['password'] = md5($req['new_pass']);
                                $res = $this->User_model->update_password($id, $data);
                                if($res) {
                                    $response = json_encode(array('result' => 'success', 'message' => 'Password changed', 'redirect' => base_url('admin/logout')));
                                } else {
                                    $response = json_encode(array('error' => 'success', 'message' => 'Something went wrong!'));
                                }
                                
                            }

                        } else {
                            $response = json_encode(array('result' => 'error', 'message' => 'Password didn\'t match!'));
                        }

                    } else {

                        $response = json_encode(array('result' => 'error', 'message' => 'Incorrect password!'));

                    }

                   echo $response;                 

                } else {
                    redirect(base_url('admin/configuration'));
                }
                
            } else {
                
                redirect(base_url());
                
            }

        }
	}