<?php
class News extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('news_model');	// 载入模型类
		$this->load->helper('url_helper');
	}

	public function index(){
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'New Archive';
		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function view($slug = null){
		$data['news_item'] = $this->news_model->get_news($slug);
		if(empty($data['news_item'])){
			show_404();
		}
		$data['title'] = $data['news_item']['title'];
		
		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer', $data);
	}

	public function create(){
		$this->load->helper('form');
		//表单验证 
		$this->load->library('form_validation');
		
		$data['title'] = 'Create A News Item';
		// 字段名，提示题，类型
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if($this->form_validation->run() === false){
			$this->load->view('templates/header', $data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');
		}else{
			$this->news_model->set_news();
			$this->load->view('news/success');
		}
	}
			
}

