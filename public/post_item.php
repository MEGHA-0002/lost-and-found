<!DOCTYPE html>
<html>
<head>
    <title>Post Lost / Found Item</title>
</head>
<body>

<h2>Post Lost / Found Item</h2>

<form action="../actions/insert_item.php"
      method="POST"
      enctype="multipart/form-data">

    <label>Item Name:</label><br>
    <input type="text" name="item_name" required><br><br>

    <label>Category:</label><br>
    <input type="text" name="category" required><br><br>

    <label>Status:</label><br>
    <select name="status" required>
        <option value="">Select</option>
        <option value="Lost">Lost</option>
        <option value="Found">Found</option>
    </select><br><br>

    <label>Location:</label><br>
    <input type="text" name="location" required><br><br>

    <label>Date:</label><br>
    <input type="date" name="date_reported" required><br><br>

    <label>Description:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Image:</label><br>
    <input type="file" name="image" required><br><br>

    <label>Contact Info:</label><br>
    <input type="text" name="contact_info" required><br><br>

    <button type="submit">Submit</button>

</form>

</body>
</html>
