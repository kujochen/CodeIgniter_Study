<?php
class News extends CI_Controller {

    //构造函数（可以在该控制器的任何方法中使用它）
    public function __construct()
    {
        parent::__construct();          //调用父类（CI_Controller）中的构造函数
        $this->load->model('news_model');   //加载模型 models/News_model.php
        $this->load->helper('url_helper');  //加载 URL 辅助函数 'url' 'url_helper'都行
    }

    //新闻首页
    public function index()
    {
        $data['news'] = $this->news_model->get_news();  //使用news_model模型的get_news()获得所有新闻条目
        $data['title'] = '新闻首页';   //定义了标题

        //传递给视图
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');

        //启用分析器
        $this->output->enable_profiler(TRUE);
        /*//使用缓存（30分钟刷新一次）
        $this->output->cache(30);*/
        print_r($data);
    }

    //新闻详细
    public function view($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug); //使用news_model模型的get_news()获得所有新闻条目（带参数）

        if (empty($data['news_item']))
        {
            show_404(); //新闻条目为空显示404
        }

        //$data['title'] = $data['news_item']['title'];

        //$this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');

        //启用分析器
        $this->output->enable_profiler(TRUE);
        /*//使用缓存（30分钟刷新一次）
        $this->output->cache(30);*/
        print_r($data);
    }

    /**
     * 创建新闻
     * todo 检查表单是否被提交，以及提交的数据是否能通过验证规则
     */
    public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title']='创建一个新的新闻';

        //设置验证规则
        //set_rules(表单中字段的名称,错误信息中使用的名称,验证规则)
        $this->form_validation->set_rules('title', '标题', 'required');
        $this->form_validation->set_rules('text', '文本', 'required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/header',$data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        }else{
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }

    //删除新闻
    public function delete($id = NULL){
        
        if (empty($id))
        {
            show_404();
        }

        if($this->news_model->delete_news($id)==true){
            $data['id']=$id;
            $this->load->view('news/delete',$data);
        }else{
            //redirect('/news', 'auto',400);
            echo "<script>alert('删除失败！');</script>";
        };
        //启用分析器
        $this->output->enable_profiler(TRUE);
    }

}