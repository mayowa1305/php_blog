<?php require 'inc/header.php' ?>


<?php if (empty($post) && is_object($post)): ?>
    <p class="error">Post Data Not Found!</p>
<?php else: ?>

    <form action="" method="post">
        <p><label for="title">Title:</label><br />
            <input type="text" name="title" id="title" value="<?=htmlspecialchars($post->title)?>" required="required" />
        </p>

        <p><label for="body">Body:</label><br />
            <textarea name="body" id="body" rows="5" cols="35" required="required"><?=htmlspecialchars($post->body)?></textarea>
        </p>

        <p><input type="submit" name="edit_submit" value="Update" /></p>
        <?php require 'inc/msg.php' ?>
    </form>
<?php endif ?>