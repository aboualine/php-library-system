<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = escapeshellarg($_POST['query']);

    // Call the Java program to search for books
    $command = "java LibraryManager search $query";
    $output = shell_exec($command);

    // Parse the output and display it in a table
    $books = explode("\n", trim($output));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Search Books</h1>
        <form action="search_book.php" method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="query" placeholder="Search by title, author, or ISBN" required>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <?php if (!empty($books)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Genre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($books as $book) {
                        $data = explode(",", $book);
                        echo "<tr>";
                        foreach ($data as $value) {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="alert alert-warning">No books found matching your search.</div>
        <?php endif; ?>

        <a href="index.php" class="btn btn-secondary">Back to Home</a>
    </div>
</body>
</html>