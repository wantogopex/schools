<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_admin extends CI_Model {

    public function add_admin() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        );
        $query = $this->db->insert('login', $data);
    }

    public function get_admin() {
        $this->load->database();
        $result = $this->db->query("SELECT * FROM login");
        return $result->result();
    }

    function delete_admin($id) {
        $result = $this->db->query("DELETE FROM login WHERE id = " . $id . "");
        return $result;
    }

    function get_id_admin($id) {
        $this->load->database();
        $this->db->select();
        $result = $this->db->query("SELECT * FROM login where id = '" . $id . "'");
        return $result->row();
    }

    function update_admin() {
        if ($this->input->post('password') == '') {
            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
            );
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
        }


        $this->db->where('id', $this->input->post('idx'));
        $this->db->update('login', $data);
    }

}
