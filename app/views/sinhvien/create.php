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

    <label for="MaLop">Lớp học:</label>
    <select id="MaLop" name="MaLop">
      <option value="">-- Chưa chọn lớp --</option>
      <?php foreach ($lophocs as $lop) : ?>
        <option value="<?php echo htmlspecialchars($lop['MaLop']); ?>">
          <?php echo htmlspecialchars($lop['MaLop']) . ' - ' . htmlspecialchars($lop['TenLop']); ?>
        </option>
      <?php endforeach; ?>
    </select><br><br>

    <input type="submit" class="btn btn-success" value="Tạo">
    <a href="/sinhvien/index" style="margin-left: 10px;" class="btn btn-danger">Hủy bỏ</a>
  </form>
</body>

</html>
