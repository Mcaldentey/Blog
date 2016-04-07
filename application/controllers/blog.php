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
                'tags' => $this -> input -> post('tags'),
                'image' => $this -> input -> post('image')
                );             
                $this -> blog_model -> insert('entries', $entry); // Saves all the data of the entry in $entry and call the function insert of blog_model
                redirect(base_url());
            }

        public function view(){ //Load the view of an entry

            $entry_id = $this -> uri -> segment(3);
            $data['entry'] = $this -> blog_model -> getEntry($entry_id);
            $data['comments'] = $this -> blog_model -> getComments($entry_id);
            $this -> load -> view('view_entry', $data);
        }

        public function comment(){ //Loads the Comentaries part of the view
            
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

        public function edit() { //Creates the entry from the edit option
            
            $id_entry = $this->uri->segment(3);
            $data['entry_data'] = $this->blog_model->getEntryData($id_entry);  
            
            $this->load->view('edit_entry', $data);
        }

        public function getEntryData($entry) { //Return the data from an entry
            
            $this->db->where('id', $entry);
            $q = $this->db->get('entries');
            
            return $q->row();
        }


        public function update_entry() { //Confirms the edit and redirect to that entry
            
            $id = $this -> input -> post('id');
            $entry = array(
                'title'  => $this -> input -> post('title'),
                'content'   => $this -> input -> post('content'),
                'tags'   => $this -> input -> post('tags'),
                );
            
            $this -> blog_model -> updateEntry($id, $entry);
            
            redirect(base_url() . 'index.php/blog/view/' . $id);
        }

        public function delete() { //Two functions to delete Entries

            $id_entry = $this -> uri -> segment(3);
            $this -> blog_model -> deleteEntry($id_entry);
            redirect(base_url());

        }

        public function deleteEntry($id) {

           return $this->db->delete('entries', array('id' => $id)); 
       }

   }