<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Giỏ hàng</title>
</head>
<body>
    <h1>GIỎ HÀNG</h1>
    <form action="" method="post" class="form ">
        Tên hàng: <input type="text" name="tenhang" placeholder = "Nhập tên hàng"><br><br>
        Số lượng: <input type="text" name="soluong" placeholder = "Nhâp số lượng"><br><br>
        Đơn giá: <input type="text" name="dongia" placeholder="Nhập đơn giá"><br><br>
        <button type="submit" name="them"  class="btn btn-info">Thêm</button>
        <button type="submit" name="hienthi" class="btn btn-info" >Hiển thị giỏ hàng</button>
    </form>
    <?php
        $i = 0;
        session_start();
        $arr = array(array());
        if (isset($_POST['them'])) {
            if (isset($_POST['tenhang']) && isset($_POST['dongia']) && isset($_POST['soluong'])) {
                if (!isset($_SESSION['arr'])) {
                    $arr[0][0] = 1;
                    $arr[0][1] = $_POST['tenhang'];
                    $arr[0][2] = $_POST['soluong'];
                    $arr[0][3] = $_POST['dongia'];
                    $arr[0][4] = $_POST['dongia'] * $_POST['soluong'];
                    $_SESSION['arr'] = $arr; 
                }else {
                    $arr = $_SESSION['arr'];
                    $i = count($arr);
                    $arr[$i][0] = $i+1;
                    $arr[$i][1] = $_POST['tenhang'];
                    $arr[$i][2] = $_POST['soluong'];
                    $arr[$i][3] = $_POST['dongia'];
                    $arr[$i][4] = $_POST['dongia'] * $_POST['soluong'];
                    $_SESSION['arr'] = $arr; 
                }
            }
        }
        if ($arr[0] == null) {
            echo "<br>Tổng số loại mặt hàng đã mua là: 0";
        }else {
            echo "<br>Tổng số loại mặt hàng đã mua là: ".count($arr);
        }
         
         
        if (isset($_POST['hienthi'])) {
            header('location:hienthigiohang.php');
        }
    ?>
</body>
</html>