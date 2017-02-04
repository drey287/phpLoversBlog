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
    ?>
        <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title"><?= $post['title']; ?></h2>
                    <p class="blog-post-meta"><?= formatDate($post['date']); ?><a href="#"><?= $post['author']; ?></a></p>
                    <p>
                        <?= $post['body']; ?>
                    </p>
                </div>
            </div>

    <?php include "includes/footer.php";?>
