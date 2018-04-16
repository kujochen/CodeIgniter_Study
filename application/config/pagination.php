<?php
$rows=new News_model();

$config['full_tag_open'] = '<ul class=pagination>';
$config['full_tag_close'] = '</ul>';

$config['first_tag_open'] = '<li>';
$config['first_link'] = '首页';
$config['first_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['prev_link'] = '上一页';
$config['prev_tag_close'] = '</li>';

//$config['display_pages'] = FALSE; //隐藏数字链接
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class=active> <a> ';
$config['cur_tag_close'] = '</a></li>';

$config['next_tag_open'] = '<li>';
$config['next_link'] = '下一页';
$config['next_tag_close'] = '</li>';

$config['last_tag_open'] = '<li>';
$config['last_link'] = '尾页';
$config['last_tag_close'] = '</li>';

$config['base_url'] = 'http://localhost/CI/news/';      //分页所在的控制器类的完整的 URL
$config['total_rows'] = $rows->db->count_all_results('news');    //数据总量
$config['num_links'] = 3;                            //“数字”链接的数量
