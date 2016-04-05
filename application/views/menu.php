<?php
        if ($this->session->userdata('is_logged_in'))
                echo 'Hello, '.$this->session->userdata('name').' ('. anchor(base_url()."index.php/users/logout/", "Logout").') | ';
        elseif (!$this->session->userdata('is_logged_in') && ($this->uri->segment(2) == 'signin' || $this->uri->segment(2) == 'validate'))
                echo anchor(base_url().'index.php/users/signup/','Sign Up').' | ';
        else
                echo anchor(base_url().'index.php/users/signin/','Sign In').' | ';

        if ($this->session->userdata('is_logged_in')){
        	echo anchor(base_url().'index.php/blog/entry/', 'New Entry');
        	echo ' | ';	
        }                
        
        echo anchor(base_url(), 'All Entries');
        echo '<hr />';
?>
