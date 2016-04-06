<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">    

    <link rel="stylesheet" type="text/css"  href='http://localhost/blog/styles/text.css'>
    <link rel="stylesheet" type="text/css"  href='http://localhost/blog/styles/button.css'>
    <link rel="stylesheet" type="text/css"  href='http://localhost/blog/styles/navigationbar.css'> <!-- CSS links -->

</head>
<body>
    <div class="nav">
        <ul>            
            <?php
                if ($this->session->userdata('is_logged_in')){ // if we have an user logged displays Logout
                    $conected = $this->session->userdata('name');
                    echo '<li class="user"><b>'.$this->session->userdata('name').'</b></li>';

                    echo '<li class="Logout"><a href="#">';
                    echo  '<h1> <?= $conected ?> </h1>'.' '. anchor(base_url()."index.php/users/logout/", "Logout").' ';
                    echo "</a></li>";
                } else {

                    echo ' <li class="Sign in"><a class="active" href="#">';
                    echo anchor(base_url().'index.php/users/signin/','Sign In').' ';
                    echo '</a></li>';
                }

                if ($this->session->userdata('is_logged_in')){ // if we have an user logged, show New entry
                    echo '<li class="New Entry"><a href="#">';
                    echo anchor(base_url().'index.php/blog/entry/', 'New Entry');
                    echo '</a></li>';

                    echo '<li class="Users"><a href="#">';
                    echo anchor(base_url().'index.php/users/users_registred/', 'Users');
                    echo '</a></li>';                    
                } 


                echo '<li class="All Entries"><a href="#">';
                echo anchor(base_url(), 'All Entries'); //Shows all entries
                echo '</a></li>';
                ?>
            </ul>
            <div class="hr"><hr class="blue" /></div>
        </div>        
    </body>
