<?php
    include "includes/header.php";


    // create db object
    $db = new Database();

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
                $query = "INSERT INTO `posts`( `title`, `body`, `category`, `author`, `tags`) VALUES ('$title', '$body', $category, '$author', '$tags')";
                $insert_row = $db->insert($query);
            }

    }

         // create query
    $query = "SELECT * FROM `categories`";

         // run query
    $categories = $db->select($query);
?>

<form role="form" method="post" action="add_post.php">
    <div class="form-group">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control" placeholder="Enter Post Body" ></textarea>
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
                <option <?= $selected; ?> value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
    </div>


    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit"></input>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
    <br>

</form>



<?php include "includes/footer.php"?>
