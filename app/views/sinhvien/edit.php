<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
</head>

<body>
  <h1> Sửa sinh viên</h1>
  <form action="/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="post">
    <label for="MSSV">MSSV:</label>
    <input type="text" id="MSSV" name="MSSV" value="<?php echo htmlspecialchars($sinhvien['MSSV']); ?>" required><br><br>

    <label for="HoTen">Tên:</label>
    <input type="text" id="HoTen" name="HoTen" value="<?php echo htmlspecialchars($sinhvien['HoTen']); ?>" required><br><br>

    <label for="GioiTinh">Giới tính:</label>
    <input type="text" id="GioiTinh" name="GioiTinh" value="<?php echo htmlspecialchars($sinhvien['GioiTinh']); ?>" required><br><br>

    <label for="MaLop">Lớp học:</label>
    <select id="MaLop" name="MaLop">
      <option value="" <?php echo empty($sinhvien['MaLop']) ? 'selected' : ''; ?>>-- Chưa chọn lớp --</option>
      <?php foreach ($lophocs as $lop) : ?>
        <option value="<?php echo htmlspecialchars($lop['MaLop']); ?>" <?php echo ($sinhvien['MaLop'] === $lop['MaLop']) ? 'selected' : ''; ?>>
          <?php echo htmlspecialchars($lop['MaLop']) . ' - ' . htmlspecialchars($lop['TenLop']); ?>
        </option>
      <?php endforeach; ?>
    </select><br><br>

    <input type="submit" class="btn btn-warning" value="Cập nhật">
    <a href="/sinhvien/index" style="margin-left: 10px;" class="btn btn-danger">Hủy bỏ</a>
  </form>
</body>

</html>
