<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tạo sinh viên</title>
</head>

<body>
  <h1>Tạo sinh viên</h1>
  <form action="/sinhvien/store" method="post">
    <label for="MSSV">MSSV:</label>
    <input type="text" id="MSSV" name="MSSV" required><br><br>

    <label for="HoTen">Tên:</label>
    <input type="text" id="HoTen" name="HoTen" required><br><br>

    <label for="GioiTinh">Giới tính:</label>
    <input type="text" id="GioiTinh" name="GioiTinh" required><br><br>

    <input type="submit" value="Tạo">
</body>

</html>