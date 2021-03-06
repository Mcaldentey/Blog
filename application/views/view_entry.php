<!DOCTYPE html>
<html lang="en">
<head>
        <!-- CSS links -->
        <link rel="stylesheet" type="text/css"  href='/assets/css/text.css'>
        <link rel="stylesheet" type="text/css"  href='/assets/css/images.css'>
        <link rel="stylesheet" type="text/css"  href='/assets/css/button.css'>
        <link rel="stylesheet" type="text/css"  href='/assets/css/navigationbar.css'> 
        <link rel="stylesheet" type="text/css"  href='/assets/css/responsive.css'>     
        <meta charset="utf-8">
        <title><?=$entry->title?></title>      
</head>
<body>
        <?php include('menu.php');?>
        <div class="entries">                
                <h2><a><?=$entry -> title?></a></h2>
                <?php echo '<img src="'.$entry -> image.'" class="resizeBig">' ?>
                <div class="subtitle"> <?php echo $entry -> subtitle ?> </div>

                <p><?=$entry -> content?></p>

                <h3>
                        Author: <?= $entry -> author?> <br/>
                        Date: <?= $entry -> date?> <br/>
                        Tags: <?= tags($entry -> tags)?>
                </h3> <!-- Takes the data from the Entry -->

                <?php
                if(!empty($comments)){
                        echo '<p>Comments</p>';
                        foreach($comments as $comment) // Loads  the coments
                                echo '<h3>'.$comment->author.'</h3>'. '<div class="p"><p class="comment">' .$comment->comment. '</p> <h3>' . $comment->date.' </h3> <hr />';
                }
                else{
                        echo '<h4>No Comments!</h4>';
                }
                ?> 
                
                <p>
                        Your comment: 
                        <?=form_open(base_url().'index.php/blog/comment/')?> <!-- Make the option to submit a comment -->
                        <?=form_hidden('id_blog', $this -> uri -> segment(3))?>
                        <?=form_textarea('comment')?>
                        <br/>
                        <?=form_submit('submit','Send', 'class="buttonGrey"')?>
                        <?=form_close()?>  

                </p> 

        </div>        
        <?php include('footer.php');?>    
</body>
</html>