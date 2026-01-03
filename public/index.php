<?php
include("../config/db.php");

$query = "SELECT * FROM items WHERE 1=1";

if (!empty($_GET['location'])) {
    $location = mysqli_real_escape_string($conn, $_GET['location']);
    $query .= " AND location LIKE '%$location%'";
}

if (!empty($_GET['status'])) {
    $status = mysqli_real_escape_string($conn, $_GET['status']);
    $query .= " AND status='$status'";
}

$query .= " ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lost & Found Portal</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .item-card img {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand fw-bold">🔍 Lost & Found Portal</span>
        <a href="post_item.php" class="btn btn-warning btn-sm">+ Post Item</a>
    </div>
</nav>

<div class="container">

    <!-- SEARCH FORM -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="location" class="form-control"
                           placeholder="Search by location"
                           value="<?php echo $_GET['location'] ?? ''; ?>">
                </div>

                <div class="col-md-4">
                    <select name="status" class="form-select">
                        <option value="">Any Status</option>
                        <option value="Lost" <?php if(($_GET['status'] ?? '')=="Lost") echo "selected"; ?>>Lost</option>
                        <option value="Found" <?php if(($_GET['status'] ?? '')=="Found") echo "selected"; ?>>Found</option>
                    </select>
                </div>

                <div class="col-md-3 d-grid">
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ITEMS LIST -->
    <div class="row">

        <?php if (mysqli_num_rows($result) == 0) { ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No items posted yet.
                </div>
            </div>
        <?php } ?>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card item-card h-100 shadow-sm">

                    <?php if ($row['image_path']) { ?>
                        <img src="<?php echo $row['image_path']; ?>" class="card-img-top">
                    <?php } ?>

                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($row['item_name']); ?>
                            <span class="badge bg-<?php echo ($row['status']=="Lost") ? "danger" : "success"; ?>">
                                <?php echo $row['status']; ?>
                            </span>
                        </h5>

                        <p class="card-text mb-1"><b>Category:</b> <?php echo $row['category']; ?></p>
                        <p class="card-text mb-1"><b>Location:</b> <?php echo $row['location']; ?></p>
                        <p class="card-text mb-1"><b>Date:</b> <?php echo $row['date_reported']; ?></p>

                        <?php if (!empty($row['description'])) { ?>
                            <p class="card-text text-muted small">
                                <?php echo htmlspecialchars($row['description']); ?>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="card-footer bg-white">
                        <small class="text-muted">
                            📞 <?php echo htmlspecialchars($row['contact_info']); ?>
                        </small>
                    </div>

                </div>
            </div>
        <?php } ?>

    </div>
</div>

</body>
</html>
