<?php

    class Affiliate extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            
            $this->load->helper('general');
            $this->load->model('Affiliate_model');
            $this->load->model('Configuration_model');
            $this->load->model('Session_model');
            $this->load->library(array('session'));
            $this->load->helper(array('url'));
            $this->load->library('user_agent');
            $this->load->helper('session');

        }

        public function index() {

            // If token exist in url
            if($this->uri->segment(2, 0)) {

                $token = $this->uri->segment(2, 0);

                $token_exist = $this->Affiliate_model->get_data_from_token($token);

                // Validate if token exist
                if($token_exist) {

                $data = $token_exist[0];
                $last_activity = datetime_now();

                // validate if requested token is not the same with the current active token
                if($this->session->userdata('token') != $data->token) {

                    // Store data logs on session table
                    $user_agent = serialize(array(
                        'agent' => $this->agent->agent_string(),
                        'platform' => $this->agent->platform(),
                        'browser' => $this->agent->browser(),
                        'version' => $this->agent->version()
                    ));
                    $sess_log = array(
                        'session_token' => $data->token,
                        'affiliate_id' => $data->id,
                        'ip' => $this->input->ip_address(),
                        'user_agent' => $user_agent,
                        'last_activity' => $last_activity,
                        'created_at' => datetime_now(),
                        'updated_at' => datetime_now()
                    );

                    $put_data = $this->Session_model->create_session_log($sess_log);

                    if($put_data) {

                        // session data processing & log
                        $sess_data = array(
                            'token'  => $data->token,
                            'affiliate_email' => $data->email,
                            'name' => $data->name,
                            'ip' => $this->input->ip_address(),
                            'last_activity' => $last_activity
                        );
                        $this->session->set_userdata($sess_data);
                        redirect(base_url());

                    } else {

                        redirect(base_url());
                        // echo 'Oops! Something went wrong!';

                    }

                    } else {

                        // Will do nothing, redirected to home
                        redirect(base_url());

                    }

                } else {

                    redirect(base_url());
                    // echo 'Token not existing';

                }

            } else {

                redirect(base_url());

            }

        }

        // For Referral token
        public function generate_link() {

            error_reporting(0);

            // validate if there is request
            if($this->input->post()) {

                $request = array(
                    'email' => $this->input->post('email'),
                    'name' => $this->input->post('name'),
                    'created_at' => datetime_now(),
                    'updated_at' => datetime_now()
                );

                // Validate if email address exist in affiliate db
                $email_avail = $this->Affiliate_model->get_data_from_email($request['email']);
                $email_name_avail = $this->Affiliate_model->get_data_from_email_name($request['email'], $request['name']);

                if($email_name_avail) {

                    $data = $email_name_avail[0];

                    $response = json_encode(array('result' => 'success', 'message' => 'Information already exist', 'link' => base_url('token/'.$data->token)));

                } else if($email_avail) {

                    $response = json_encode(array('result' => 'error', 'message' => 'Email not available'));

                } else {

                    // Process data to create token
                    // $hashids = new \Hashids\Hashids($request['email'].$request['name']);
                    // $token = $hashids->encode(strtotime('now'));
                    $token = uniqid();

                    $request['token'] = $token;
                    $put_data = $this->Affiliate_model->create_token($request);

                    if($put_data) {

                        $response = json_encode(array('result' => 'success', 'message' => 'Successfully created a referral link', 'link' => base_url('token/'.$token)));

                    } else {
                        $response = json_encode(array('result' => 'error', 'message' => 'Something went wrong'));
                    }

                }

            } else {

                $response = json_encode(array('result' => 'error', 'message' => 'There are no request.'));

            }

            echo $response;

        }
    
    }