<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Section</title>
    <script src="/blog/js/dist/admin.bundle.js" defer></script>
    <?php
        include "../partial/style.php"
    ?>
</head>
<body>
    <header>
        <?php
        include "../partial/header.php"
        ?>
    </header>
    <main>
        <div class="container mt-5">

            <h2>Add New Post:</h2>
            <form id="postForm">
                <div class="form-group">
                    <label for="postTitle">Title:</label>
                    <input type="text" class="form-control" id="postTitle" name="title" required>
                </div>
                <div class="form-group">
                    <label for="postDescription">Description:</label>
                    <textarea class="form-control" id="postDescription" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="postContent">Content:</label>
                    <textarea class="form-control" id="postContent" name="content" rows="6" required></textarea>
                </div>
                <div class="form-group">
                    <label for="postAuthor">Author:</label>
                    <input type="text" class="form-control" id="postAuthor" name="author" required>
                </div>
                <div class="form-group">
                    <label for="postImage">Upload Image:</label>
                    <input type="file" class="form-control-file" id="postImage" name="image[]" accept="image/*" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <hr>

            <h2>Post List:</h2>
            <ul id="postList" class="list-group">

            </ul>

        </div>
    </main>


    <?php
        include "../partial/footer.php"
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
