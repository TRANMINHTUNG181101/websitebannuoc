<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    Mat khau cua ban da duoc cap nhat thanh cong
    <br>
    Thoi gian: <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    
    echo date('h:i:sa'),"<br>";
    echo ' ngay: ';
    echo date('Y-m-d'); ?>
</body>

</html>
