<?php
class News_model extends CI_model{

	public function __construct(){
		$this->load->database();
	}

	public function get_news($slug = false){
		if($slug === false){
			// 获取所有数据
			$query = $this->db->get('news');
			return $query->result_array();
		}
		// 通过条件获取数据
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}

	public function set_news(){
		$this->load->helper('url');
		// 处理title
		$slug = url_title($this->input->post('title'), 'dash', true);
	
		$data = [
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text')
		];
		// 插入数据库 (表名, 数据[])
		return $this->db->insert('news', $data);
	}
}

