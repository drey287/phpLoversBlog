<?php
    include "includes/header.php";


         // create db object
    $db = new Database();

    if (isset($_POST['submit'])){
             // asign vars
        $name = mysqli_real_escape_string($db->link, $_POST['name']);

        if ($name == '') {
                 // set error
            $error =  "Please fill out all the required field";
        }
        else {
            $query = "INSERT INTO `categories`( `name`) VALUES ('$name')";
            $update_row = $db->insert($query);
        }

    }
?>

    <form role="form" method="post" action="add_category.php">
        <div class="form-group">
            <label>Category Name</label>
            <input name="name" type="text" class="form-control"  placeholder="Add Category">
        </div>
        <div>
            <input name="submit" type="submit" class="btn btn-default" value="Submit"></input>
            <a href="index.php" class="btn btn-default">Cancel</a>

        </div>
      <br>

    </form>


<?php include "includes/footer.php"?>