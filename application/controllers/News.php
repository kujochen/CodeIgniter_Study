<?php
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();          //调用父类（CI_Controller）中的构造函数
        $this->load->model('news_model');   //加载模型 models/News_model.php
        $this->load->helper('url_helper');  //加载了 URL 辅助函数
    }

    //新闻首页
    public function index()
    {
        $data['news'] = $this->news_model->get_news();  //使用news_model模型的get_news()获得所有新闻条目
        $data['title'] = 'News archive';   //定义了标题

        //传递给视图
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
        print_r($data);
    }

    //新闻详细页面
    public function view($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug); //使用news_model模型的get_news()获得所有新闻条目（带参数）

        if (empty($data['news_item']))
        {
            show_404(); //新闻条目为空显示404
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
        print_r($data);
    }


}