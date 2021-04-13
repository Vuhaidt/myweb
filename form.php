<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form upload file PHP</title>
</head>
<body>
    <form action="form_upload.php" method="post" enctype="multipart/form-data">
        <h2>Form Upload File PHP</h2>
        <label for="fileSelect">Tên file:</label>
        <input type="file" name="photo" id="fileSelect">
        <input type="submit" name="submit" value="Upload file">
        <p><strong>Ghi chú:</strong> Chỉ cho phép định dạng .jpg, .jpeg, .gif và kích thước tối đa tệp tin là 5MB.</p>
    </form>
</body>
</html>