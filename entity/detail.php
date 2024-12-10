<?php
include '../functions.php';

// Fetch the post ID from the URL
$id = $_GET['id'] ?? null;
$posts = readData('../data/posts.json');
$post = getPostById($id, $posts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post ? $post['title'] : 'Post Not Found'; ?></title>
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- Include Header -->
    <?php include '../includes/header.php'; ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1><?php echo $post ? $post['title'] : 'Post Not Found'; ?></h1>
                        <?php if ($post): ?>
                            <span class="meta">
                                Posted by <?php echo $post['author']; ?> on <?php echo $post['date']; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php if ($post): ?>
                        <p><?php echo $post['content']; ?></p>
                    <?php else: ?>
                        <p class="text-danger">Sorry, this post does not exist.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </article>

    <!-- Include Footer -->
    <?php include '../includes/footer.php'; ?>
</body>
</html>
