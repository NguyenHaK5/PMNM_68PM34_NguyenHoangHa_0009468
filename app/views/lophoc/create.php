<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tạo lớp học</title>
</head>

<body>
  <h1>Tạo lớp học</h1>
  <form action="/lophoc/store" method="post">
    <label for="MaLop">Mã lớp:</label>
    <input type="text" id="MaLop" name="MaLop" required><br><br>

    <label for="TenLop">Tên lớp:</label>
    <input type="text" id="TenLop" name="TenLop" required><br><br>

    <label for="SiSo">Sĩ số:</label>
    <input type="number" id="SiSo" name="SiSo" min="0" required><br><br>

    <label for="GiaoVien">Giáo viên chủ nhiệm:</label>
    <input type="text" id="GiaoVien" name="GiaoVien" required><br><br>

    <input type="submit" class="btn btn-success" value="Tạo">
    <a href="/lophoc/index" style="margin-left: 10px;" class="btn btn-danger">Hủy bỏ</a>
  </form>
</body>

</html>
