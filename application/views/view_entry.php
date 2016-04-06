<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title><?=$entry->title?></title>      
</head>
<body>
        <?php include('menu.php');?>
       
        <h2><?=$entry -> title?></h2>
        <div class="p">
                <p class="margin"><?=$entry -> content?></p>
        </div>
        <h3>
        Author: <?= $entry -> author?> <br/>
        Date: <?= $entry -> date?> <br/>
        Tags: <?= tags($entry -> tags)?></h3> <!-- Loads the data from the Entry -->

        <?php
                if(!empty($comments)){
                        echo '<h3>Comments</h3>';
                        foreach($comments as $comment)
                                echo '<h4>'.$comment->author.'</h4>'.
                                $comment->comment.'<br />'.
                                $comment->date.'<hr />';
                }
                else
                        echo '<h4>No Comments!</h4>';
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
                        
        

</body>
</html>