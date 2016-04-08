<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model {
    
        public function getEntries(){ //get al the entries from the database in desc order
            
            $this -> db -> order_by('date DESC');
            return $this -> db -> get('entries')->result();
        }
        
        public function insert($table, $data){ //insert a table on the database
            
            return $this -> db -> insert($table, $data);
        }


	public function validate_credentials($username, $password){ // return the row on the Db from that user and that password

        $this -> db ->where('username', $username);
        $this -> db ->where('password', $password);
        return $this -> db -> get('users')->row();
    }

        public function getEntry($id){ // get the Entty with that id

            $this -> db -> where('id', $id);
            return $this -> db -> get('entries') -> row();
        }

        public function getComments($id){ //get the comments of the blog with that id

            $this -> db -> where('id_blog', $id);
            return $this -> db -> get('comments') -> result();
        }


        public function getEntryData($entry) {

            $this->db->where('id', $entry);
            $q = $this->db->get('entries');
            
            return $q->row();
        }
        
        public function updateEntry($id, $data) {

            $this->db->where('id', $id);
            
            return $this->db->update('entries', $data);
        }
        
        public function deleteEntry($id) {

            return $this->db->delete('entries', array('id' => $id)); 
        }

        public function getUsers(){
            return $this -> db -> get('users') -> result();            
        }

        public function enterUser($name, $username, $password) {

            $this->db->set('name', $name); 
            $this->db->set('username', $username);
            $this->db->set('password', $password);
            return $this->db->insert('users');
        }

    
    }
