<?php

include "includes/header.php";

    // create db object
    $db = new Database();
        // create query
        $query = "SELECT * FROM `posts` ORDER BY id DESC ";
        // run query
        $posts = $db->select($query);

        // create query
        $query = "SELECT * FROM `categories`";
        // run query
        $categories = $db->select($query);
?>
<div class="col-sm-8 blog-main">
<?php if ($posts) { ?>
      <?php  while ($row = $posts->fetch_assoc()){ ?>
          <div class="blog-post">
                <h2 class="blog-post-title"><?= $row['title']; ?></h2>
                <p class="blog-post-meta"><?= formatDate($row['date']); ?><a href="#"><?= $row['author']; ?></a></p>
                <p>
                    <?= shortenText($row['body']); ?>
                </p>
                <a class="readmore" href="post.php?id=<?= urlencode($row['id']); ?>">Read More</a>
            </div>
      <?php } ?>
</div>

<?php } else{ echo "There are no posts yet";} ?>



<?php include "includes/footer.php";?>
