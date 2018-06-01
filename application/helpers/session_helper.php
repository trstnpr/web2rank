<?php

    function sess_expire() {

        // initiate global function vars
        $app =& get_instance();
        $sess_time_limit = 86400; // set limit in seconds (1day)
        $now = strtotime('now');

        // Validate if there is an active session token
        if($app->session->userdata('token')) {

            // convert session last_activity ti strtotime()
            $sess_time_start = strtotime($app->session->userdata('last_activity'));
            $sess_time_end = $sess_time_start + $sess_time_limit;

            // check active session limit
            if($sess_time_end < $now) {

                // unset sessions
                $sess_data = array(
                    'id', 'token', 'affiliate_email', 'name', 'ip', 'last_activity'
                );
                
                $sess_destroy = $app->session->unset_userdata($sess_data);

                if($sess_destroy) {

                    // will initiate session for guest sess_start_guest()
                    sess_start_guest();


                } else {
                    // Do nothing
                }

            } else {

                // Do nothing

            }

        } else {

            // will initiate session for guest sess_start_guest()
            sess_start_guest();

        }

    }

    function sess_start_guest() {

        // will start generate hash token for session
        $app =& get_instance();
        $app->load->model('Session_model');
        $app->load->library('user_agent');

        // Process data to create token
        $email = the_config('admin_email');
        $name = 'Guest';
        $ip = $app->input->ip_address();
        $last_activity = datetime_now();

        // $hashids = new \Hashids\Hashids($email.$name);
        // $token = $hashids->encode(strtotime('now'));
        $token = uniqid();

        $user_agent = serialize(array(
            'agent' => $app->agent->agent_string(),
            'platform' => $app->agent->platform(),
            'browser' => $app->agent->browser(),
            'version' => $app->agent->version()
        ));
        $sess_log = array(
            'session_token' => $token,
            'ip' => $ip,
            'user_agent' => $user_agent,
            'last_activity' => $last_activity,
            'created_at' => datetime_now(),
            'updated_at' => datetime_now()
        );

        $put_data = $app->Session_model->create_session_log($sess_log);

        if($put_data) {

            // session data processing & log
            $sess_data = array(
                'token'  => $token,
                'affiliate_email' => $email,
                'name' => $name,
                'ip' => $ip,
                'last_activity' => $last_activity
            );
            $app->session->set_userdata($sess_data);

            // redirect(base_url());

        } else {

            // redirect(base_url());

        }

        


    }