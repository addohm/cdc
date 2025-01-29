<?php
header('Content-Type: application/json');

$imageDir = 'images/carousel/'; // Path to the carousel images directory
$images = [];

// Check if the directory exists
if (is_dir($imageDir)) {
    // Open the directory
    if ($dh = opendir($imageDir)) {
        // Read files from the directory
        while (($file = readdir($dh)) !== false) {
            // Filter out non-image files
            if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
                $images[] = $file;
            }
        }
        closedir($dh);
    }
}

// Return the list of images as JSON
echo json_encode($images);
?>