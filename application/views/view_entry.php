<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title><?=$entry->title?></title>      
</head>
<body>
        <?php include('menu.php');?>
       
        <h2><?=$entry->title?></h2>
        <p><?=$entry->content?></p>
        Author: <?=$entry->author?><br />
        Date: <?=$entry->date?><br />
        Tags: <?=tags($entry->tags)?><hr />

        <?php
                if(!empty($comments)){
                        echo '<h3>Comments</h3>';
                        foreach($comments as $comment)
                                echo '<h4>'.$comment->author.'</h4>'.
                                $comment->comment.'<br />'.
                                $comment->date.'<hr />';
                }
                else
                        echo '<h3>No Comments!</h3>';
        ?>

        
                        Your comment:
                        <?=form_open(base_url().'index.php/blog/comment/')?>
                        <?=form_hidden('id_blog', $this->uri->segment(3))?>
                        <?=form_textarea('comment')?>
                        <?=form_submit('submit','Send')?>
                        <?=form_close()?>
        

</body>
</html>