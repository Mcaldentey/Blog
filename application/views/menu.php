<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">       
    <link rel="stylesheet" type="text/css"  href='http://localhost/blog/styles/all.css'>
</head>
<body>
        <div id="left"></div>
        <div id="right"></div>
</body>

<?php

        if ($this->session->userdata('is_logged_in'))
                echo  $this->session->userdata('name').' '.anchor(base_url()."index.php/users/logout/", "Logout", 'class="button"').' ';
                
        elseif (!$this->session->userdata('is_logged_in') && ($this->uri->segment(2) == 'signin' || $this->uri->segment(2) == 'validate'))
                echo anchor(base_url().'index.php/users/signup/','Sign Up', 'class="button"').' ';
        
        else
                echo anchor(base_url().'index.php/users/signin/','Sign In', 'class="button"').' ';

        if ($this->session->userdata('is_logged_in')){
        	echo anchor(base_url().'index.php/blog/entry/', 'New Entry', 'class="button"');
        	echo ' ';	
        }                
        
        echo anchor(base_url(), 'All Entries', 'class="button"');
        echo '<hr />';
?>
