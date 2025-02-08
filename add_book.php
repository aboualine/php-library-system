<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = escapeshellarg($_POST['title']);
    $author = escapeshellarg($_POST['author']);
    $isbn = escapeshellarg($_POST['isbn']);
    $genre = escapeshellarg($_POST['genre']);

    // Call the Java program to add the book
    $command = "java LibraryManager add $title $author $isbn $genre";
    $output = shell_exec($command);

    echo "<script>alert('$output'); window.location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add a New Book</h1>
        <form action="add_book.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
    <div>
        <a href="index.php">Go Back!</a>
    </div>
</body>
</html>