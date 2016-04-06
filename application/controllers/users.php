<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this -> load -> model('blog_model');
        }

        public function signin(){
                $this -> load -> view('signin');
        }

        public function users_registred(){
                $data['all_users'] = $this -> blog_model -> getUsers();
                $this -> load -> view('view_users', $data);
        }
        
        
        public function validate(){ //function that validates if the user introduced exists on the database
                $username = $this -> input -> post('username');
                $password = $this -> input -> post('password');
                if($user = $this -> blog_model -> validate_credentials($username, $password)){
                        $session = array(
                                'name' => $user -> name,
                                'username' => $username,
                                'is_logged_in' => TRUE,                        
                                );
                        $this -> session -> set_userdata($session);
                        redirect(base_url());
                }
                else{
                        $this -> load -> view('signin', array('error'=>TRUE));
                }
        }

        
        public function logout(){ //finishes the session
                if($this->session->userdata('is_logged_in'))
                        $this -> session -> sess_destroy();        
                redirect(base_url());                  
        }

        public function register() {
                $this -> load -> view('user_register');
        }
}