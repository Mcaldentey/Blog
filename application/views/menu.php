<!DOCTYPE html>
<?php require_once 'wurfl/src/autoload.php'; ?>
<html lang="en">
<head>
    <meta charset="utf-8">    

    <!-- CSS links -->
    <link rel="stylesheet" type="text/css"  href='http://localhost/blog/styles/text.css'>
    <link rel="stylesheet" type="text/css"  href='http://localhost/blog/styles/images.css'>
    <link rel="stylesheet" type="text/css"  href='http://localhost/blog/styles/button.css'>
    <link rel="stylesheet" type="text/css"  href='http://localhost/blog/styles/navigationbar.css'> 

    <!-- JQuery Scripts -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
    <script>

        $(document).ready(function(){

            $('#menu').click(function(){
                if ($(".options").css("display") === ("block")) {
                    $(".options").hide();                 
                } else {
                    $(".options").show();          
                }
                
            });

            $('#name').click(function(){
                
                
            });

        });

        function users_register_not_empty(){
            if ($('#register_name').length === 0) {
                return false;
            }
        }

    </script>

</head>
<body>

    <div class="nav">
        <?php echo '<a href="'.base_url().'"><img src="http://i.imgur.com/HSfikT0.png" class="logo"></a>' ?>
        <ul>              
            <?php
                if ($this->session->userdata('is_logged_in')){ // if we have an user logged displays Logout
                    $conected = $this->session->userdata('name');
                    echo '<li class="user"><b>'.$this->session->userdata('name').'</b></li>';

                    echo '<li class="Logout"><a href="#">';
                    echo  anchor(base_url()."index.php/users/logout/", "Logout");
                    echo "</a></li>";
                } else {

                    echo ' <li class="Sign up"><a href="#">';
                    echo anchor(base_url().'index.php/users/new_user/','Sign Up').' ';
                    echo '</a></li>';

                    echo ' <li class="Sign in"><a href="#">';
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

                <?php
                // Include the autoloader - edit this path! 
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


