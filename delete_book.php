<?php
if (isset($_GET['isbn'])) {
    $isbn = escapeshellarg($_GET['isbn']);

    // Call the Java program to delete the book
    $command = "java LibraryManager delete $isbn";
    $output = shell_exec($command);

    echo "<script>alert('$output'); window.location.href='index.php';</script>";
}
?>