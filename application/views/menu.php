<!DOCTYPE html>
<?php require_once 'wurfl/src/autoload.php'; ?>
<html lang="en">
<head>
    <meta charset="utf-8">    

    <!-- CSS links -->
    <link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/text.css">
    <link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/images.css">
    <link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/button.css">
    <link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/navigationbar.css">
    <link rel="stylesheet" type="text/css"  href="<?=base_url()?>assets/css/responsive.css">

    <!-- JQuery Scripts -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
    <script>

        $(document).ready(function(){ //shows or hide the advanced options

            $('.menu').click(function(){
                if ($(".options").css("display") === ("block")) {
                    $(".options").hide();                 
                } else {
                    $(".options").show();          
                }
            });

        });

    </script>

</head>
<body>

    <div class="nav">
        <?php echo '<a href="'.base_url().'"><img src="'.base_url().'assets/imgs/logo.png" class="logo"></a>' ?> <!-- Logo -->
        <ul>
            <?php
                if ($this->session->userdata('is_logged_in')){ // if we have an user logged displays his name
                    $conected = $this->session->userdata('name');
                    echo '<li class="user"><b>'.$this->session->userdata('name').'</b></li>';

                    echo '<li class="Logout"><a href="#">'; // if we have an user logged displays Logout
                    echo  anchor(base_url()."index.php/users/logout/", "Logout");
                    echo "</a></li>";
                } else {

                    echo ' <li class="Sign up"><a href="#">'; //If there's not users conected displays log in and log out
                    echo anchor(base_url().'index.php/users/new_user/','Sign Up').' ';
                    echo '</a></li>';

                    echo ' <li class="Sign in"><a href="#">';
                    echo anchor(base_url().'index.php/users/signin/','Sign In').' ';
                    echo '</a></li>';
                }

                if ($this->session->userdata('is_logged_in')){ // if we have an user logged, shows New entry
                    echo '<li class="New Entry"><a href="#">';
                    echo anchor(base_url().'index.php/blog/entry/', 'New Entry');
                    echo '</a></li>';
                }

                if ($this -> session -> userdata('username') == 'admin') { //If the admin is logged, display Users
                    echo '<li class="Users"><a href="#">';
                    echo anchor(base_url().'index.php/users/users_registred/', 'Users');
                    echo '</a></li>'; 
                }                     


                

                echo '<li class="All Entries"><a href="#">';
                echo anchor(base_url(), 'All Entries'); //Shows all entries
                echo '</a></li>';
                ?>

                <?php
                    // Include the autoloader
                require_once 'wurfl/src/autoload.php'; 
                    // Create a configuration object  
                $config = new ScientiaMobile\WurflCloud\Config();  
                    // Set your WURFL Cloud API Key  
                $config->api_key = '506180:tOpobuIFCjlmTaRa2WvbxZx4fe7QpTb6';   
                    // Create the WURFL Cloud Client  
                $client = new ScientiaMobile\WurflCloud\Client($config);  
                    // Detect your device  
                $client->detectDevice();  
                    // Use the capabilities  
                echo '<div class="device">Conected from: '.$client->getDeviceCapability('complete_device_name').'</div>';                  
                ?>       
            </ul>
            <div class="hr"><hr class="blue" /></div>

        </div>        

    </body>


