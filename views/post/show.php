<?php include __DIR__ . "/../layout/header.php"; ?>

<br />
<br />

<div class="panel panel-default">
 <div class="panel-heading">
   <h3 class="panel-title"><?php echo $post['title']; ?></h3>

 </div>
    <div class="panel-body">
        <?php echo nl2br($post['content']); ?>
    </div>

    <ul>
        <?php foreach ($comments AS $comment): ?>

            <li>
                <?php echo $comment->content; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="post" action="post?id=<?php echo $post["id"];?>">
        <textarea name="content" class ="form-control"></textarea>
        <br>
        <input ttype="submit" value="Kommentar hinzufügen" class="btn btn-primary">
    </form>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
