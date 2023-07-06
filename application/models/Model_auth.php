<?php
    class Model_auth extends CI_Model{
        function __construct() {
            parent::__construct();
        }

        function get($table){
            return $this->db->get($table);
        }

        function get_where($table, $where){
            return $this->db->get_where($table, $where);   
        }

        function insert($table, $object){
            $this->db->insert($table, $object);
        }
        
    }