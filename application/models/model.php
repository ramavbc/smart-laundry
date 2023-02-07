<?php 
    class Model extends CI_Model{
        public function get_all($table)
        {
            return $this->db->get($table);
        }

        public function get_by($table,$id, $where)
        {
            return $this->db->get_where($table, [$id=>$where]);
        }

        public function save($table,$data)
        {
            $this->db->insert($table, $data);
        }

        public function delete($table, $pk, $where)
        {
            $this->db->delete($table, [$pk=>$where]);
        }

        public function update($table, $id, $where, $data)
        {
            $this->db->update($table, $data , [$id=>$where]);
        }

        public function reset_pass($table, $id, $where, $field)
        {
            $pass = '$2y$10$NuJpueDsXtO2jre2Dq5TXucFV8hEnOV4CLUnMAgvCpO5o2wIe6wOG';
            $data = [$field=>$pass];
            $this->db->update($table, $data, [$id=>$where]);
        }

        public function proses()
        {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->join('transaksi_status','transaksi.id_transaksi=transaksi_status.id_transaksi_s');
            $this->db->where('transaksi_status.selesai=0');
            $query = $this->db->get();

            return $query->result();
        }

        public function simpanData($data = null) {
            $this->db->insert('user', $data);
        }

        public function getUser()
        {
            $this->db->select('*');
            $this->db->from('user');
            $query = $this->db->get();

            return $query->result();
        }

        public function getTransaksi()
        {
            $this->db->select('*');
            $this->db->from('transaksi');
            $query = $this->db->get();

            return $query->result();
        }

        public function getJenis()
        {
            $this->db->select('*');
            $this->db->from('jenis');
            $query = $this->db->get();

            return $query->result();
        }

        function getCustomer()
        {
            $this->db->select('*');
            $this->db->from('customer');
            $query = $this->db->get();

            return $query->result();
        }

        function getSupplier()
        {
            $this->db->select('*');
            $this->db->from('supplier');
            $query = $this->db->get();

            return $query->result();
        }

        public function selectUser($where = null){
            $this->db->select('*');
            $this->db->from('user');
            return $this->db->get();
        }

        public function selectCustomer($where = null){
            $this->db->select('*');
            $this->db->from('customer');
            return $this->db->get();
        }

        public function selectTransaksi($where = null){
            $this->db->select('*');
            $this->db->from('transaksi');
            return $this->db->get();
        }

        public function selectBarang($where = null){
            $this->db->select('*');
            $this->db->from('barang');
            return $this->db->get();
        }
    }
?>