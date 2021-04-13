<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận - XYZ</title
</head>
<body>
<?php 

    // Bản quyền © 2020 bởi tienminhvy.com, bảo lưu mọi quyền
    // Vui lòng ghi nguồn nếu chia sẻ lại

    $db = mysqli_connect('localhost', 'root', '', 'xss', 3306);
    if (!$db) {
        die("<h1>Không thể kết nối đến cơ sở dữ liệu!<h1>");
    }

    if (isset($_POST['username'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $msg = mysqli_real_escape_string($db, $_POST['msg']);

        $status = mysqli_query($db, "INSERT INTO msg (username, msg) VALUES ('$username', '$msg')");

        if (!$status) {
            die("ERROR");
        } else {
            header("Refresh: 0");
        }

        
    }

    $result = mysqli_query($db, "SELECT * FROM msg");

    $content = '';

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $content .= <<<HTML
                <div class="cmt">
                    <p class="cmt-username">Username: <b>@$row[username]</b></p>
                    <p class="cmt-msg">MSG: > $row[msg]</p>
                    <div class="cmt-time">Time: $row[time]</div>
                </div>
            HTML;

        }
    }

?>
    <form method='GET'>
        <input value='<?php echo $username ?>' type="text" name="username" placeholder="Please username which you want to find">
        <button type="submit">Find</button>
    </form>
    <div class="usf">
        <?php
            echo $usf
        ?>
    </div>
    <div class="comment-section">
        <?php echo $content ?>
    </div>

</body>
</html>
