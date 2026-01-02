<?php
include("../config/db.php");


if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    die("Invalid request method");
}


$item_name     = trim($_POST['item_name'] ?? '');
$category      = trim($_POST['category'] ?? '');
$status        = trim($_POST['status'] ?? '');
$location      = trim($_POST['location'] ?? '');
$date_reported = trim($_POST['date_reported'] ?? '');
$description   = trim($_POST['description'] ?? '');
$contact_info  = trim($_POST['contact_info'] ?? '');


if (
    $item_name === '' || $category === '' || $status === '' ||
    $location === '' || $date_reported === '' || $contact_info === ''
) {
    die("All required fields must be filled");
}


if (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
    die("Image upload failed");
}

$image = $_FILES['image'];
$allowed_ext = ['jpg', 'jpeg', 'png'];

$ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

if (!in_array($ext, $allowed_ext)) {
    die("Only JPG, JPEG, PNG images are allowed");
}

if ($image['size'] > 2 * 1024 * 1024) {
    die("Image size must be less than 2MB");
}

$new_name = uniqid("item_", true) . "." . $ext;
$upload_path = "../uploads/" . $new_name;

if (!move_uploaded_file($image['tmp_name'], $upload_path)) {
    die("Failed to save image");
}


$check = $conn->prepare(
    "SELECT id FROM items 
     WHERE item_name=? AND location=? AND DATE(created_at)=CURDATE()"
);
$check->bind_param("ss", $item_name, $location);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    die("Duplicate entry detected");
}

$stmt = $conn->prepare(
    "INSERT INTO items
    (item_name, category, status, location, date_reported, description, image_path, contact_info)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "ssssssss",
    $item_name,
    $category,
    $status,
    $location,
    $date_reported,
    $description,
    $upload_path,
    $contact_info
);

if ($stmt->execute()) {
    echo "Item posted successfully";
} else {
    die("Database insert failed");
}
?>
