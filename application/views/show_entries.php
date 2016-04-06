
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta charset="utf-8">
    <title>View Entries</title> 
</head>
<body>
    
    <?php include('menu.php');?>
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
            
            <h2><a><?=anchor(base_url().'index.php/blog/view/'.$entry -> id, $entry -> title)?></a></h2>
            <div class="h3"><h3 class="margin">                                
                <?=anchor(base_url().'index.php/blog/edit/'.$entry -> id, $edit)?>
                <?=anchor(base_url().'index.php/blog/delete/'.$entry -> id, $delete)?>                                                                            
            </h3>
            <h3 class="margin">
                Author: <?=$entry -> author?> <br/>
                Date: <?=$entry -> date?> 
            </h3></div>                                        
            <hr/>
            
            
        <?php endforeach; ?>
    <?php else : ?>
        <h1>No entries</h1>
    <?php endif; ?>
    

</body>
</html>