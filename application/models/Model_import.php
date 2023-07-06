<?php
    class Model_import extends CI_Model{
        function __construct() {
            parent::__construct();
        }

        function get($table){
            return $this->db->get($table);
        }

        function get_where($table, $where){
            return $this->db->get_where($table, $where);   
        }

        function get_last($table, $order){
            $this->db->select($order);
            $this->db->order_by($order, "desc");
            $this->db->limit(1);
            return $this->db->get($table);   
        }

        function get_duatable($select, $table1, $table2, $join, $where, $order)
        {
            $this->db->select($select);
            $this->db->from($table1);
            $this->db->join($table2, $join);
            $this->db->where($where);
            $this->db->order_by($order, "asc");
            $query = $this->db->get();
            return $query->result();
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

        public function get_limatable($select, $table1, $table2, $table3, $table4, $table5,  $join1, $join2, $join3, $join4, $where){
            $this->db->select($select);    
            $this->db->from($table1);
            $this->db->join($table2, $join1);
            $this->db->join($table3, $join2);
            $this->db->join($table4, $join3);
            $this->db->join($table5, $join4);
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }

        function getForm2($param){
            $query = $this->db->query(
                "SELECT bidang.bidang,  
                COUNT(DISTINCT CONCAT(program.kode_urusan, '.', program.kode_bidang, '.', program.kode_program)) as jumlah_program, 
                COUNT(DISTINCT CONCAT(kegiatan.kode_urusan, '.', kegiatan.kode_bidang, '.', kegiatan.kode_program, '.', kegiatan.kode_kegiatan)) as jumlah_kegiatan, 
                COUNT(DISTINCT CONCAT(sub_kegiatan.kode_urusan, '.', sub_kegiatan.kode_bidang, '.', sub_kegiatan.kode_program, '.', sub_kegiatan.kode_kegiatan, '.', sub_kegiatan.kode_sub_kegiatan)) as jumlah_sub_kegiatan,
                SUM(renja.pagu_indikatif) as jumlah_pagu
                FROM bidang  
                JOIN program 
                    ON bidang.kode_urusan=program.kode_urusan AND bidang.kode_bidang=program.kode_bidang
                JOIN kegiatan
                    ON program.kode_urusan=kegiatan.kode_urusan AND program.kode_bidang=kegiatan.kode_bidang AND program.kode_program=kegiatan.kode_program
                JOIN sub_kegiatan
                    ON kegiatan.kode_urusan=sub_kegiatan.kode_urusan AND kegiatan.kode_bidang=sub_kegiatan.kode_bidang AND kegiatan.kode_program=sub_kegiatan.kode_program AND kegiatan.kode_kegiatan=sub_kegiatan.kode_kegiatan
                JOIN renja
                    ON sub_kegiatan.kode_urusan=renja.kode_urusan AND sub_kegiatan.kode_bidang=renja.kode_bidang AND sub_kegiatan.kode_program=renja.kode_program AND sub_kegiatan.kode_kegiatan=renja.kode_kegiatan AND sub_kegiatan.kode_sub_kegiatan=renja.kode_sub_kegiatan
                WHERE $param
                GROUP BY bidang.kode_urusan,bidang.kode_bidang
                ");
            return $query->result();
            
        }

        function insert($table, $object){
            $this->db->insert($table, $object);
        }

        function update($table, $where, $object){
            $this->db->where($where);
            $this->db->update($table, $object);
        }

        function delete($table, $where){
            $this->db->where($where);
            $this->db->delete($table);
        }
    }