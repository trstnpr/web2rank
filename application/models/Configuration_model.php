<?php

    class Configuration_model extends CI_Model {

        protected $table = 'configuration';
        protected $key = 'key';

        public function __construct() {

            parent::__construct();

        }
        
        public function get_config()
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

        public function set_config($key, $value) {

            if($this->is_key_exists($key)){
                $data['value'] = $value;
                return $this->update_config($key, $data);
            } else {
                return $this->add_config($key, $value);
            }

        }

        public function is_key_exists($key) {

            $this->db->select('key');
            $this->db->where($this->key,$key);

            $dataset=$this->db->get($this->table);

            if($dataset->num_rows()==1){
                return TRUE;
            } else {
                return FALSE;
            }

        }

        public function update_config($key, $data) {

            $this->db->where($this->key,$key);

            if($this->db->update($this->table, $data)){
                return true;
            } else {
                return false;
            }

        }

        public function add_config($key, $value, $label=null){

            $data = array(
                'key' => $key,
                'value' => $value,
                'label' => $label
            );

            return $this->db->insert($this->table, $data);
        }

        public function get_config_value_from_key($key) {

            $this->db->select('value');
            $this->db->from($this->table);
            $this->db->where('key',$key);

            $dataset = $this->db->get();

            if($dataset->num_rows()){
                return $dataset->result();
            } else {
                return FALSE;
            }

        }

    }