<?php

    class Test_model extends CI_Model {

        public function __construct() {

            $this->tableName = 'test';
            $this->primaryKey = 'id';

        }
        
        public function insert($data = array()) {

            if(!array_key_exists("created",$data)) {

                $data['created'] = date("Y-m-d H:i:s");

            }

            if(!array_key_exists("modified",$data)) {

                $data['modified'] = date("Y-m-d H:i:s");

            }

            $insert = $this->db->insert($this->tableName,$data);

            if($insert) {

                return $this->db->insert_id();

            } else {

                return false;

            }
        }

    }