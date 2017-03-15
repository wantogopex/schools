<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class m_berita_terbaru extends CI_Model
{
    function insert_berita($data) {
        $this->db->insert('berita_terbaru', $data);
    }
    
    function get_berita(){
        $this->load->database();
        $result = $this->db->query("SELECT * FROM berita_terbaru ORDER BY id_berita DESC");
        return $result->result();
    }
    
    function link_photo($id) {

        $this->db->where('id_berita', $id);
        $query = $getData = $this->db->get('berita_terbaru');

        if ($getData->num_rows() > 0)
            return $query;
        else
            return null;
    }
    
    function hapus_photo($id) {
        $this->db->where('id_berita', $id);
        $this->db->delete('berita_terbaru');
    }
    
    function get_data_barang_by_id($data) {
        $this->db->where($data);
        $query = $this->db->get('berita_terbaru');
        $data = $query->first_row();
        return $data;
    }
    
    function get_update($data){
        $this->db->where('id_berita', $this->input->post('id_berita'));
        $this->db->update('berita_terbaru', $data);
    }
}
