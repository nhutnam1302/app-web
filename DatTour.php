<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bt";

// tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm kết nối
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM diadiem"; 
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Đặt Tour Du Lịch</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="DatTour.css"> 
</head>

<header>
    <div>
        <div class="topnav">
            <a href="#"> <b>ĐỊA ĐIỂM </b></a>
            <a href="#"> <b>ĂN UỐNG </b></a>
            <a href="#"> <b>LƯU TRÚ </b></a>
            <a href="#"> <b>ĐẶC SẢN </b></a>
            <a href="#"> <b>PHẢN HỒI </b></a>
          </div>
    <img src="anh/dattour.jpg"  class="img-header"/>
    </div>
</header>

<body>
<div class="row">
  <div class="side">
    <h2><u>Thông tin tour</u></h2>
    <h3>TOUR 30/4</h3>
    
    <form class="form-info-tour">
            <p>Mã tour: <b>SD001</b> <br> <br>
            <label> Ngày khởi hành</label>
            <input type="date" name="ngaybatdau"> <br> <br>
            <label> Ngày kết thúc</label>
            <input type="date" name="ngayketthuc"> <br> <br>
            Giá tour: 470.000VNĐ
            </p>
    </form>
    
    <h3><u>Thông tin người đặt tour</u></h3>
    <p>
    <div class="container">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="ten">Họ và tên</label>
        <input type="text" id="ten" name="ten" placeholder="Họ và tên...">
    
        <label for="sdt">Số điện thoại</label>
        <input type="text" id="sdt" name="sdt" placeholder="Số điện thoại...">
    
        <label for="socho">Số chỗ</label>
        <select id="socho" name="socho">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      
        <input type="submit" value="ĐẶT VÉ">
      </form>
      <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $name = $_POST["ten"];
          if(empty($name)){
            echo "Name is empty";}
            else{echo $name;
            
          }
          $name = $_POST["sdt"];
          if(empty($name)){
            echo "Name is empty";}
            else{echo $name;
              
          }
        }
        
      ?>
    </div>
  </div>
  
  <div class="main">
    <h2><u>LỊCH TRÌNH</u></h2>
    <?php 
 if ($result->num_rows > 0) {
  // Load dữ liệu lên website
  while($row = $result->fetch_assoc()) {
  // echo "mã sinh viên " . $row["masv"]. " - Tên: " . $row["hotensv"]. " - Năm sinh: "
  // . $row["namsinh"]. " - Quê quán: ". $row["quequan"]."<br>";
 
    ?>
    <div class="fakeimg" style="height:150px;">
      <img src="anh/lang-hoa-sa-dec-4.jpg" style="height:100px;"/>
      <p><?php $row["tendiadiem"]." - ".$row["diachi"]." - " .$row["thongtin"] ?></p>
    </div>

    <?php

}
} else {
echo "0 results";
}
$conn->close();
?>
    <!-- <div class="fakeimg" style="height:150px;">
      <img src="anh/lang-hoa-sa-dec-4.jpg" style="height:100px;"/>
    </div>
    <div class="fakeimg" style="height:150px;">
      <img src="anh/lang-hoa-sa-dec-4.jpg" style="height:100px;"/>
    </div> -->
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>
