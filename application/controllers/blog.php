<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {
	
        public function __construct(){
                parent::__construct();
                $this->load->model('blog_model');              
        }
       
        public function index(){ //Loads the view show_entries and complete it

                $data['entries'] = $this->blog_model->getEntries();     
                
                if ($this->session->userdata('is_logged_in')) {
                    $username = $this->session->userdata('username');
                    $data['my_entries'] = $this->blog_model->getMyEntries($username);    
                }
                
                $this->load->view('show_entries', $data);
        }

        public function entry(){ //Loads the view new_entry
                
                $this -> load -> view('new_entry');
        }
        
        public function insert_entry(){ //Add a new entry with the data submited from the view new_entry
                
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

        public function view(){ //

                $entry_id = $this -> uri -> segment(3);
                $data['entry'] = $this -> blog_model -> getEntry($entry_id);
                $data['comments'] = $this -> blog_model -> getComments($entry_id);
                $this -> load -> view('view_entry', $data);
        }

        public function comment(){
                
                $id_blog = $this -> input -> post('id_blog');

                $user = 'Anonymous';
                        if ( $this -> session -> userdata('is_logged_in')) {
                                $user = $this -> session -> userdata('name');
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

        public function edit() {
                
                $id_entry = $this->uri->segment(3);
                $data['entry_data'] = $this->blog_model->getEntryData($id_entry);  
                     
                $this->load->view('edit_entry', $data);
        }

        public function getEntryData($entry) {
                
                $this->db->where('id', $entry);
                $q = $this->db->get('entries');
                  
                return $q->row();
        }


        public function update_entry() {
                
                $id = $this -> input -> post('id');
                $entry = array(
                'title'  => $this -> input -> post('title'),
                'content'   => $this -> input -> post('content'),
                'tags'   => $this -> input -> post('tags'),
                );
                      
                $this -> blog_model -> updateEntry($id, $entry);
                  
                redirect(base_url() . 'index.php/blog/view/' . $id);
        }

        public function updateEntry($id, $data) {
                
                $this -> db -> where('id', $id);
                return $this -> db -> update('entries', $data);
        }

        public function delete() {

                $id_entry = $this -> uri -> segment(3);
                $this -> blog_model -> deleteEntry($id_entry);
                redirect(base_url());
        }

        public function deleteEntry($id) {

             return $this->db->delete('entries', array('id' => $id)); 
        }

}