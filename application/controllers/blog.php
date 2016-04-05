<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {
	
        public function __construct(){
                parent::__construct();
                $this->load->model('blog_model');              
        }
       
        public function index(){
                
                $data['entries'] = $this -> blog_model -> getEntries();
                $this -> load -> view('show_entries', $data);
        }

        public function entry(){
                
                $this -> load -> view('new_entry');
        }
        
        public function insert_entry(){
                
                $user = 'Anonymous';
                if ( $this -> session -> userdata('is_logged_in')) {
                        $user = $this -> session -> userdata('name');
                }

                $entry = array(
                        'permalink' => permalink($this -> input -> post('title')),
                        'author' => $user,
                        'title' => $this -> input -> post('title'),
                        'content' => $this -> input -> post('content'),
                        'date' => date('Y-m-d H:i:s'),
                        'tags' => $this -> input -> post('tags')
                        );             
                $this -> blog_model -> insert('entries', $entry);
                redirect(base_url());
        }

        public function view(){

                $entry_id = $this -> uri -> segment(3);
                $data['entry'] = $this -> blog_model -> getEntry($entry_id);
                $data['comments'] = $this -> blog_model -> getComments($entry_id);
                $this -> load -> view('view_entry', $data);
        }

        public function comment(){
                
                $id_blog = $this -> input -> post('id_blog');

                $user = 'Anonymous';
                        if ( $this -> session -> userdata('is_logged_in')) {
                                $user = $this->session->userdata('name');
                        }

                $comment = array(
                        'id_blog' => $id_blog,
                        'author' => $user,
                        'comment' => $this -> input -> post('comment'),
                        'date' => date('Y-m-d H:i:s')
                        );
                $this -> blog_model -> insert('comments', $comment);
                redirect(base_url().'index.php/blog/view/'.$id_blog);
        }

}