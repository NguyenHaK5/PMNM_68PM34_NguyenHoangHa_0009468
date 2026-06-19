<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>

  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }

    th {
      background-color: #04AA6D;
      color: white;
    }
  </style>

</head>

<body>
  <h1><?php echo $title; ?></h1>
  <a href="/lophoc/create" class="btn btn-success" style="margin-bottom: 10px;">Thêm lớp học</a>

  <form action="/lophoc/index" method="get" style="margin-bottom: 10px;">
    <input type="text" name="search" placeholder="Tìm theo Mã lớp / Tên lớp" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <input type="submit" class="btn btn-primary" value="Tìm kiếm">
  </form>

  <table>
    <tr>
      <th>STT</th>
      <th>Mã Lớp</th>
      <th>Tên Lớp</th>
      <th>Sĩ Số</th>
      <th>Giáo Viên</th>
      <th>Thao tác</th>
    </tr>
    <?php foreach ($lophocs as $index => $lophoc) : ?>
      <tr>
        <td><?php echo $index + 1; ?></td>
        <td><?php echo htmlspecialchars($lophoc['MaLop']); ?></td>
        <td><?php echo htmlspecialchars($lophoc['TenLop']); ?></td>
        <td><?php echo htmlspecialchars($lophoc['SiSo']); ?></td>
        <td><?php echo htmlspecialchars($lophoc['GiaoVien']); ?></td>
        <td>
          <a href="/lophoc/edit/<?php echo $lophoc['id']; ?>" class="btn btn-primary">Sửa</a>
          <a href="/lophoc/delete/<?php echo $lophoc['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này không?')">Xóa</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <div>
    <?php
    $pageSize = 5;
    for ($i = 1; $i <= $totalPages; $i++) {
      $offset = ($i - 1) * $pageSize;
      echo "<a href='/lophoc/index/$pageSize/$offset' class='btn btn-success' style='margin-right: 5px; margin-top: 5px;'>$i</a>";
    }
    ?>
  </div>

</body>

</html>
