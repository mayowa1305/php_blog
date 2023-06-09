<?php require 'inc/header.php' ?>


<form action="" method="post">

    <p><label for="title">Title:</label><br />
        <input type="text" name="title" id="title" required="required" />
    </p>

    <p><label for="body">Body:</label><br />
        <textarea name="body" id="body" rows="5" cols="35" required="required"></textarea>
    </p>

    <p><label for="image">Image:</label><br />
        <textarea name="image" id="image" rows="5" cols="35" required="required"></textarea>
    </p>

    <p><label for="author">Author:</label><br />
        <textarea name="author" id="author" rows="5" cols="35" required="required"></textarea>
    </p>

    <p><input type="submit" name="add_submit" value="Add" /></p>
  
</form>

<?php require 'inc/msg.php' ?>

