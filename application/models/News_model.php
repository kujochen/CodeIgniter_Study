<?php
class News_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url_helper');
    }

    //新闻首页
    public function get_news($per_page = NULL,$page = NULL)
    {
       //limit 查询$per_page个，从$page开始
       $query = $this->db->limit($per_page,$page)->get('news');
       $total_rows=$this->db->count_all('news');
        $arr[0]=$query->result_array();
        $arr[1]=$total_rows;
       return $arr;

    }

    //详细新闻获取
    public function get_news_byID($id = NULL){
        //urldecode()→url编码后的字符串还原成未编码的样子
        $query=$this->db->get_where('news', array('id' => intval($id)));
        return $query->row_array(); //返回单独一行row
    }

    //向数据库插入新闻数据
    public function set_news(){
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
    public function delete_news($id = NULL){
        $this->db->delete('news',array('id'=>intval($id)));
        $del=$this->db->affected_rows();
        return $del;
    }

    //修改新闻数据
    public function fix_news($id = NULL){
        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data=array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );
        ;
        return $this->db->where('id', $id)->update('news',$data);
    }

    //搜索新闻
    public function search_news($per_page = NULL,$page = NULL,$search = NULL){
        //$search=$this->input->post('search');
        $array=array('title'=>urldecode($search),'text'=>urldecode($search));
        $query=$this->db->select('id,title')->or_like($array)->limit($per_page,$page)->get('news');

        $this->db->or_like($array)->from('news');
        $total_rows=$this->db->count_all_results();

        $arr[0]=$query->result_array();
        $arr[1]=$total_rows;

        return $arr;
    }
}