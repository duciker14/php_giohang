<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION['arr'])) {
            if (!isset($_POST['delete'])) { 
                $arr = $_SESSION['arr'];
                echo "<h2>Giá trị đơn hàng</h2><br/>";
                echo "<table border = 1><tr><th>STT</th><th>Tên Hàng</th><th>Số lượng</th><th>Đơn giá</th><th>Thành tiền</th></tr>";
                
                for ($j = 0; $j < count($arr); $j++) {
                    echo "<tr><td>".$arr[$j][0]."</td><td>".$arr[$j][1]."</td><td>".$arr[$j][2]."</td><td>".$arr[$j][3]."</td><td>".$arr[$j][4]."</td></tr>";
                }
                $sum = 0;
                for ($i=0; $i < count($arr); $i++) { 
                    $sum += $arr[$i][4];
                }
                echo "<tr><td><b>Tổng</b></td><td></td><td></td><td></td><td>$sum</td></tr>";
                echo '</table>';
        }else {
            echo "Giỏ hàng rỗng!";
            session_destroy();
            unset($_SESSION['arr']);
        }   
        }else {
            echo "Giỏ hàng rỗng!";
        }
        
        
    ?>
    
    <br><br><a href ="giohang.php"><button class="btn btn-info">Trở lại</button></a><br><br>
    <form action="" method="post">
        <button type="submit" name="delete" value="" class="btn btn-info">Xoá giỏ hàng</button>
    </form>
</body>
</html>