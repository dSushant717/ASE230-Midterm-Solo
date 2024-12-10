<?php
include '../functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Amusement Park</title>
    <link href="../assets/css/styles.css" rel="stylesheet"> 
</head>
<body>
    <!-- Include Header -->
    <?php include '../includes/header.php'; ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Anime Amusement Park</h1>
                        <span class="subheading">Your gateway to anime-inspired adventures!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>
                    Welcome to the Anime Amusement Park Blog! Explore thrilling attractions inspired by your favorite anime like One Piece, Attack on Titan, and Naruto.
                </p>
                <p>
                    Check out our latest updates and immersive attractions by visiting our <a href="../posts.php">Posts Page</a>.
                </p>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include '../includes/footer.php'; ?>
</body>
</html>
