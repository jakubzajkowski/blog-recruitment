<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Post</title>
    <?php
    include "../partial/style.php"
    ?>
</head>
<body>
    <?php
    include "../partial/header.php"
    ?>

    <?php
    $title='';
    $img='';
    $description='';
    $content='';
    $author='';
    $date='';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $postController = new \app\src\PostController();
            $post = $postController->getPost($id)[0];
            $title=$post['title'];
            $img=$post['img'];
            $description=$post['description'];
            $content=$post['content'];
            $author=$post['author'];
            $date=$post['date'];
        } else {
            echo 'id not provided in the URL.';
        }
    ?>

    <main class="mx-auto w-75 my-5">
        <h1><?php echo $title ?></h1>
        <h5 class="my-3"><?php echo $description ?></h5>
        <img class="w-50" src="<?php echo $img ?>" alt="car" loading="lazy">
        <p class="my-3"><?php echo $content ?></p>
        <p class="my-3"><?php echo $author ?></p>
        <p class="my-3">Date: <?php echo substr($date,0,10) ?></p>
    </main>

    <?php
    include "../partial/footer.php"
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
