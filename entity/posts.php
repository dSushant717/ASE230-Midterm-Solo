<?php
include '../functions.php'; 
session_start();

// Fetch blog posts
$posts = readData('../data/posts.json'); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- Include Header -->
    <?php include '../includes/header.php'; ?> 

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../assets/img/header.png')"> 
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>All Blog Posts</h1>
                        <span class="subheading">Explore all our anime-themed posts!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Button to Create New Post (Visible to Logged-In Users Only) -->
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="create.php" class="btn btn-primary mb-3">Create New Post</a>
                <?php endif; ?>

                <!-- Display Posts -->
                <?php foreach ($posts as $id => $post): ?>
                    <div class="post-preview">
                        <a href="detail.php?id=<?= $id ?>">
                            <h2 class="post-title"><?= htmlspecialchars($post['title']); ?></h2>
                            <h3 class="post-subtitle"><?= htmlspecialchars(substr($post['content'], 0, 100)) . '...'; ?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by <?= htmlspecialchars($post['author']); ?> on <?= htmlspecialchars($post['date']); ?>
                            <?php if (isset($_SESSION['user'])): ?>
                                | <a href="edit.php?id=<?= $id ?>">Edit</a>
                                | <a href="delete.php?id=<?= $id ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                            <?php endif; ?>
                        </p>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include '../includes/footer.php'; ?> 
</body>
</html>
