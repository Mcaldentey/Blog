<!DOCTYPE html>

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

        });

    </script>

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

        
        <?php
/*
            // Provide the absolute or relative path to your wurfl-config.xml
        $wurflConfigFile = "wurfl-php-1.7.0.0\examples\wurfl-config.xml";

    // Create WURFL Configuration from an XML config file
        $wurflConfig = new WURFL_Configuration_XmlConfig($wurflConfigFile);

    // Create a WURFL Manager Factory from the WURFL Configuration
        $wurflManagerFactory = new WURFL_WURFLManagerFactory($wurflConfig);

    // Create a WURFL Manager
        $wurflManager = $wurflManagerFactory->create();

        require_once('C:\xampp\htdocs\blog\wurfl-dbapi-1.7.0.0\TeraWurfl.php');
            // instantiate a new TeraWurfl object
        $wurflObj = new TeraWurfl();

            // Get the capabilities of the current client.
        $wurflObj->getDeviceCapabilitiesFromRequest();

        $device_name = $wurflObj -> getDeviceCapability('device_name');
        $is_tablet = $wurflObj -> getDeviceCapability('is_tablet');
        $is_smartphone = $wurflObj -> getDeviceCapability('is_smartphone');

        if ($is_tablet) {
            echo '<p>Is a tablet</p>';
        } elseif ($is_smartphone) {
            echo '<p>Is a smartphone</p> <p>'.$device_name.'</p>';
        }
*/        
        ?>
    </body>


