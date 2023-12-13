<?php
$view = new stdClass();
$view->pageTitle = 'signUp';
require_once('Views/newBlog.phtml');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $subject = $_POST['subject'];
    $description = $_POST['description'];

    // Validate and sanitize the input (you can add more validation as needed)
    $subject = htmlspecialchars($subject);
    $description = htmlspecialchars($description);

    // Construct the HTML code for the new juice item
    $newBlogHTML = "
    <div class='post'>
        <h2>$subject</h2>
        <p>$description</p>
    </div>
    ";

    // Specify the path to your menu.phtml file
    $blogFilePath = 'Views/Blog.phtml';

    // Check if the file exists and is writable
    if (is_writable($blogFilePath)) {
        // Open the file in append mode
        if ($file = fopen($blogFilePath, 'a')) {
            // Write the new juice HTML code to the file
            fwrite($file, $newBlogHTML);

            // Close the file
            fclose($file);

            echo 'Post has been successfully added.';
        } else {
            echo 'Error opening the blog file.';
        }
    } else {
        echo 'blog file is not writable or does not exist.';
    }
}
?>

