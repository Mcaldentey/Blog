
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>View Entries</title>     
</head>
<body>
        <?php include('menu.php');?>

        <?php if (!empty($entries)) : ?>
                <?php foreach($entries as $entry) : ?>
                    <?php 
                        
                            $edit   = 'Edit'; 
                            $delete = 'Delete';
                        
                    ?>
                        <h2><?=anchor(base_url().'index.php/blog/view/'.$entry->id,$entry->title)?></h2>
                        <h3>
                            <?=anchor(base_url().'index.php/blog/edit/'.$entry->id, $edit)?>
                            <?=anchor(base_url().'index.php/blog/delete/'.$entry->id, $delete)?>
                        </h3>
                        Author: <?=$entry->author?><br />
                        Date: <?=$entry->date?><hr />
                <?php endforeach; ?>
        <?php else : ?>
                <h1>No entries</h1>
        <?php endif; ?>
</body>
</html>