<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <style>
    footer {
      background-color: blue;
      /* Màu tím chính */
      color: white;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    footer a {
      color: #e0d4ff;
      text-decoration: none;
    }

    footer a:hover {
      color: white;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <footer class="py-3">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <p class="mb-1">&copy; <?php echo date("Y"); ?> QLSinhVien. All Rights Reserved.</p>
          <p class="mb-0 small">
            Developed by <strong>Tạ Tương Đạt</strong> |
            <a href="#">Chính sách bảo mật</a> |
            <a href="#">Liên hệ</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>