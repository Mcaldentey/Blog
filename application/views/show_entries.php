<!DOCTYPE html>
<html lang="en">
<head>        
    <meta charset="utf-8">
    <title>View Entries</title> 
    <!-- Datatables links -->    

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
    <?php include('menu.php');?>    

    <div class="entries">  
        <?php if (!empty($entries)) : ?> <!-- Shows all the entries -->
            <?php foreach($entries as $entry) : ?>
                <?php                            
                $edit   = ' '; 
                $delete = ' ';   
                
                if ($this -> session -> userdata('is_logged_in')){

                    $edit   = 'Edit'; 
                    $delete = 'Delete';                            
                }
                ?>
                
                <?php echo'<a href="'.'index.php/blog/view/'.$entry -> id.'"><img src="'.$entry -> image.'" class="resizeSmall" /></a>' ?>   
                <h2><a><?=anchor(base_url().'index.php/blog/view/'.$entry -> id, $entry -> title)?></a></h2> <!-- Load the entry image and the title --> 

                <div class="h3">
                    <?php  
                    if ($this -> session -> userdata('username') == 'admin') { //If the admin is conected, displays the options
                        echo '<div id="menu" class="menu">';
                        echo '<h5>Options</h5>';
                        echo '</div>';
                    }                     
                    ?>  
                    <br/>

                    <div id="options" class="options">
                        <h5 class="margin">  
                            <?=anchor(base_url().'index.php/blog/edit/'.$entry -> id, $edit)?> <!-- Shows the options Edit / Delete -->                     
                            <?php
                            echo anchor(base_url().'index.php/blog/delete/'.$entry -> id, $delete, array('onclick' => "return confirm('Delete this Entry?')"))
                            ?>                                                                          
                        </h5>
                    </div> 
                    
                </div>
                <h3 class="h3 margin">
                    Author: <?=$entry -> author?> <br/>
                    Date: <?=$entry -> date?> 
                </h3>
                <hr/>


            <?php endforeach; ?>
        <?php else : ?>
            <h1>No entries</h1>
        <?php endif; ?>

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
        echo '<div class="deviceMobile">Conected from: '.$client->getDeviceCapability('complete_device_name').'</div>';                  
        ?>       
    </div>
    <?php include('footer.php');?>    
</body>
</html>