<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title><?=$entry->title?></title>      
</head>
<body>
        <?php include('menu.php');?>
        <div class="entries">                
                <h2><?=$entry -> title?></h2>
                <?php echo '<img src="'.$entry -> image.'" class="resizeBig">' ?>

                <p><?=$entry -> content?></p>

                <h3>
                        Author: <?= $entry -> author?> <br/>
                        Date: <?= $entry -> date?> <br/>
                        Tags: <?= tags($entry -> tags)?>
                </h3> <!-- Loads the data from the Entry -->

                <?php
                if(!empty($comments)){
                        echo '<p>Comments</p>';
                        foreach($comments as $comment)
                                echo '<h3>'.$comment->author.'</h3>'. '<div class="p"><p class="comment">' .$comment->comment. '</p> <h3>' . $comment->date.' </h3> <hr />';
                }
                else{
                        echo '<h4>No Comments!</h4>';
                }
                ?> <!-- Loads  the coments -->
                
                <p>
                        Your comment:
                        <?=form_open(base_url().'index.php/blog/comment/')?>
                        <?=form_hidden('id_blog', $this -> uri -> segment(3))?>
                        <?=form_textarea('comment')?>
                        <br/>
                        <?=form_submit('submit','Send', 'class="buttonGrey"')?>
                        <?=form_close()?>  

                </p> <!-- Make the option to submit a comment -->

        </div>        
        <?php include('footer.php');?>    
</body>
</html>