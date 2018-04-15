<?php
class News_model extends CI_Model {

    public function __construct()
    {
        //parent::__construct();
        $this->load->database();
    }

    public function get_news($id = FALSE)
    {
        if ($id === FALSE)
        {
           $query = $this->db->get('news');
            return $query->result_array();
        }

        //$query=$this->db->query("select * from news where slug=$slug");
        //urldecode()→url编码后的字符串还原成未编码的样子
        //$query = $this->db->get_where('news', array('slug' => urldecode($slug)));
        $query=$this->db->get_where('news', array('id' => intval($id)));
        return $query->row_array(); //返回单独一行row
    }

    //向数据库插入新闻数据
    public function set_news(){
        $this->load->helper('url_helper');

        //url_title→将字符串中的空格替换成连接符（-），并将所有字符转换为小写
        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }

    //删除新闻数据
    public function delete_news($id){
        return $this->db->delete('news',array('id'=>intval($id)));
    }

    //修改新闻数据
    public function fix_news($id){
        $this->load->helper('url_helper');

        //url_title→将字符串中的空格替换成连接符（-），并将所有字符转换为小写
        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data=array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );
        $this->db->where('id', $id);
        return $this->db->update('news',$data);
    }
}