<?php
require_once 'core/init.php';
$files = new Files();
if (Input::exists()) {
    // TODO validate then run the upload.
    $files->upload(Input::get('file')['name'], Input::get('file')['tmp_name']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload | Order Management</title>
    <?php include_once 'icons.php'; ?>
</head>
<body>
<?php include_once 'header.php'; ?>
<div class="ui container">
    <h2>Upload a file</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit">
    </form>
</div>
</body>
</html>