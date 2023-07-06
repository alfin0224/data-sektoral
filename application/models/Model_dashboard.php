<?php
    class Model_dashboard extends CI_Model{
        function __construct() {
            parent::__construct();
        }

        function get($table){
            return $this->db->get($table);
        }

        function get_where($table, $where){
            return $this->db->get_where($table, $where);   
        }

        function get_where_in($select, $table, $where, $in)
        {
            $this->db->select($select);
            $this->db->from($table);
            $this->db->where_in($where, $in);
            $query = $this->db->get();
            return $query->result();
        }

        function get_where_not_in($select, $table, $where, $in)
        {
            $this->db->select($select);
            $this->db->from($table);
            $this->db->where_not_in($where, $in);
            $query = $this->db->get();
            return $query->result();
        }

        function insert($table, $object){
            $this->db->insert($table, $object);
        }
        
    }