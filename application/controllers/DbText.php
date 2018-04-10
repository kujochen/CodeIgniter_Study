<?php
class DbText extends CI_Controller{
    function index(){
        $this->load->database();
        $query=$this->db->query("select id,name from text");
        foreach ($query->result() as $row) {//返回对象数组
            echo $row->id."<br>";
            echo $row->name."<br>";
        }
        echo "数据行数==".$query->num_rows();
    }
}