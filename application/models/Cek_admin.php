<?php

class Cek_admin extends CI_Model {

    function login($username, $password)
    {
	$query = $this->db->get_where('login',array('username'=>$username,'password'=>md5($password)));
	
	if($query->num_rows() == 1)
	{
	    return $query->result();
	}
	else
	{
	    return false;
	}
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

