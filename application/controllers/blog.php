<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function __construct(){
                parent::__construct();
                $this->load->model('blog_model');              
        }
       
        public function index(){
                $data['entries'] = $this->blog_model->getEntries();
                $this->load->view('show_entries', $data);
        }
        public function entry(){
                $this->load->view('new_entry');
        }
        public function insert_entry(){
                $entry = array(
                        'permalink' => permalink($this->input->post('title')),
                        'author' => 'anon',
                        'title' => $this->input->post('title'),
                        'content' => $this->input->post('content'),
                        'date' => date('Y-m-d H:i:s'),
                        'tags' => $this->input->post('tags')
                        );             
                $this->blog_model->insert('entries', $entry);
                redirect(base_url());
        }
}