<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
</head>

<body>
  <h1>Sửa lớp học</h1>
  <form action="/lophoc/update/<?php echo $lophoc['id']; ?>" method="post">
    <label for="MaLop">Mã lớp:</label>
    <input type="text" id="MaLop" name="MaLop" value="<?php echo htmlspecialchars($lophoc['MaLop']); ?>" required><br><br>

    <label for="TenLop">Tên lớp:</label>
    <input type="text" id="TenLop" name="TenLop" value="<?php echo htmlspecialchars($lophoc['TenLop']); ?>" required><br><br>

    <label for="SiSo">Sĩ số:</label>
    <input type="number" id="SiSo" name="SiSo" value="<?php echo htmlspecialchars($lophoc['SiSo']); ?>" min="0" required><br><br>

    <label for="GiaoVien">Giáo viên chủ nhiệm:</label>
    <input type="text" id="GiaoVien" name="GiaoVien" value="<?php echo htmlspecialchars($lophoc['GiaoVien']); ?>" required><br><br>

    <input type="submit" class="btn btn-warning" value="Cập nhật">
    <a href="/lophoc/index" style="margin-left: 10px;" class="btn btn-danger">Hủy bỏ</a>
  </form>
</body>

</html>
