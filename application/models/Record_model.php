<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 2017-09-19
 * Time: 18:37
 */

class Record_model extends CI_Model
{
    public function insert_new_login_record($un = null, $pwd = null){
        if ($un == null || $pwd == null) return null;
        $this->db->insert("record",array("un"=>$un,"pwd"=>$pwd));
    }
}