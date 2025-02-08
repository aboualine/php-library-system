<?php
$command = "java LibraryManager view";
$output = shell_exec($command);

$books = explode("\n", trim($output));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Library Management System</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Genre</th>
                    <th>Action</th>
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
                    echo "<td><a href='delete_book.php?isbn={$data[2]}' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_book.php" class="btn btn-success">Add New Book</a>
    </div>
    
    <div class="text-center mt-4">
        <a href="search_book.php" class="btn btn-info">Search Books</a>
    </div>
</body>
</html>