<?php
$csvFile = 'books.csv';

if (!file_exists($csvFile) || filesize($csvFile) == 0) {
    $message = "<div class='alert alert-warning'>No books found. Add some books to get started!</div>";
} else {
    $file = fopen($csvFile, 'r');

    $table = "<table class='table table-striped'>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

    while (($data = fgetcsv($file)) !== FALSE) {
        if (count($data) < 4) {
            continue;
        }

        $table .= "<tr>";
        foreach ($data as $value) {
            $table .= "<td>$value</td>";
        }
        $table .= "<td><a href='delete_book.php?isbn={$data[2]}' class='btn btn-danger'>Delete</a></td>";
        $table .= "</tr>";
    }

    $table .= "</tbody></table>";

    fclose($file);
}
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
        <?php
        if (isset($message)) {
            echo $message;
        } else {
            echo $table;
        }
        ?>
        <div class="text-center mt-4">
            <a href="add_book.php" class="btn btn-success">Add New Book</a>
            <a href="search_book.php" class="btn btn-info">Search Books</a>
        </div>
    </div>
</body>
</html>