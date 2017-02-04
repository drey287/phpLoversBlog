<?php
    include "includes/header.php";
    $id = $_GET['id'];

        // create db object
    $db = new Database();
        // create query
    $query = "SELECT * FROM `posts` WHERE id=".$id;
        // run query
    $post = $db->select($query)->fetch_assoc();

        // create query
    $query = "SELECT * FROM `categories`";
        // run query
    $categories = $db->select($query);

    if (isset($_POST['submit'])){
        // asign vars
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

        if ($title == '' || $body == '' || $category == '' || $author == '') {
            // set error
            $error =  "Please fill out all the required fields";
        }
        else {
            $query = "UPDATE `posts` SET `title`= '$title',`body`= '$body',`category`= '$category',`author`= '$author',`tags`= '$tags' WHERE id=".$id;
            $update_row = $db->update($query);
        }
    }


    if (isset($_POST['delete'])) {
        $query = "DELETE FROM `posts` WHERE  id=".$id;

        $delete_row = $db->delete($query);
        // call delete method
    }
?>

<form role="form" method="post" action="edit_post.php?id=<?php echo $id ; ?>">
    <div class="form-group">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?= $post['title'];?>">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control" placeholder="Enter Post Body" >
                <?= $post['body'];?>
        </textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">

<!--            pull in the categoies from database -->
            <?php while( $row = $categories->fetch_assoc() ) { ?>
                <?php
                if ($row['id'] == $post['category']) {
                    $selected = 'selected';
                }
                else {
                    $selected = '';
                }

                ?>
                <option <?= $selected; ?> value="<?= $row['id']; ?>" ><?= $row['name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input name="author" type="text" class="form-control" placeholder="Enter Author Name" value="<?= $post['author'];?>" >
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?= $post['tags'];?>">
    </div>


    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit"></input>
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete"></input>

    </div>
    <br>

</form>



<?php include "includes/footer.php"?>
