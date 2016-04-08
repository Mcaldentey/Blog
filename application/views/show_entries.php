<!DOCTYPE html>
<html lang="en">
<head>        
    <meta charset="utf-8">
    <title>View Entries</title> 
    <!-- Datatables links -->    

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.jqueryui.min.css">   

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
                <h2><a><?=anchor(base_url().'index.php/blog/view/'.$entry -> id, $entry -> title)?></a></h2>

                <div class="h3">
                    <?php  
                    if ($this -> session -> userdata('is_logged_in')) {                     
                        echo '<div id="menu" class="menu">';
                        echo '<h5>Options</h5>';
                        echo '</div>';
                    }                     
                    ?>  
                    <br/>                  
                    <div id="options" class="options">
                        <h5 class="margin">  
                            <?=anchor(base_url().'index.php/blog/edit/'.$entry -> id, $edit)?>                        
                            <?php
                            echo anchor(base_url().'index.php/blog/delete/'.$entry -> id, $delete, array('onclick' => "return confirm('Delete this Entry?')"))
                            ?>                                                                          
                        </h5>
                    </div> 

                    <h3 class="margin">
                        Author: <?=$entry -> author?> <br/>
                        Date: <?=$entry -> date?> 
                    </h3></div>   
                    <hr/>


                <?php endforeach; ?>
            <?php else : ?>
                <h1>No entries</h1>
            <?php endif; ?>
        </div>

    </body>
    </html>