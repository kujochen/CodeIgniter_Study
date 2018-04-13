<?php
class News_model extends CI_Model {

    public function __construct()
    {
        //parent::__construct();
        $this->load->database();
    }

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        //$query=$this->db->query("select * from news where slug=$slug");
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    //向数据库插入新闻数据
    public function set_news(){
        $this->load->helper('url');

        //url_title→将字符串中的空格替换成连接符（-），并将所有字符转换为小写
        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }
}