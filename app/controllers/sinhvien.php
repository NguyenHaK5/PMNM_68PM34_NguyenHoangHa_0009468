<?php
require_once "../app/core/controller.php";
class sinhvien extends Controller
{
  public function index($limit = 5, $offset = 0, $search = "")
  {
    $sinhvienModel = $this->model('sinhvienModel');
    //$sinhviens = $sinhvienModel->getAllSinhVien();
    $result = $sinhvienModel->paging($limit, $offset, $search);
    $sinhviens = $result['sinhviens'];
    $totalPages = $result['totalPages'];
    // Trả về View
    //require_once "../app/views/sinhvien/index.php";
    $this->view('layout/masterLayout', ['viewname' => 'sinhvien/index', 'sinhviens' => $sinhviens, 'title' => 'Danh sách sinh viên', 'totalPages' => $totalPages]);
  }

  public function create()
  {
    // Lấy danh sách lớp học để hiển thị trong dropdown
    $lophocModel = $this->model('lophocModel');
    $lophocs = $lophocModel->getAllLopHoc();

    // Trả về View
    $this->view('sinhvien/create', ['lophocs' => $lophocs]);
  }

  public function store()
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $MSSV = $_POST['MSSV'];
      $HoTen = $_POST['HoTen'];
      $GioiTinh = $_POST['GioiTinh'];
      $MaLop = $_POST['MaLop'] !== '' ? $_POST['MaLop'] : null;

      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->create($MSSV, $HoTen, $GioiTinh, $MaLop);
      if ($result) {
        header("Location: /sinhvien/index");
        exit();
      } else {
        echo "Thêm mới sinh viên thất bại!";
        exit();
      }
    }
  }

  public function edit($id)
  {
    $id = (int)$id;
    $sinhvienModel = $this->model('sinhvienModel');
    $sinhvien = $sinhvienModel->getSinhVienById($id);

    if (!$sinhvien) {
      echo "Sinh viên không tồn tại!";
      exit();
    }

    // Lấy danh sách lớp học để hiển thị trong dropdown
    $lophocModel = $this->model('lophocModel');
    $lophocs = $lophocModel->getAllLopHoc();

    $this->view('layout/masterLayout', ['viewname' => 'sinhvien/edit', 'sinhvien' => $sinhvien, 'lophocs' => $lophocs, 'title' => 'Sửa thông tin Sinh viên']);
  }

  public function update($id)
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = (int)$id;
      $MSSV = $_POST['MSSV'];
      $HoTen = $_POST['HoTen'];
      $GioiTinh = $_POST['GioiTinh'];
      $MaLop = $_POST['MaLop'] !== '' ? $_POST['MaLop'] : null;

      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->update($id, $MSSV, $HoTen, $GioiTinh, $MaLop);

      if ($result) {
        header("Location: /sinhvien/index");
        exit();
      } else {
        echo "Cập nhật sinh viên thất bại!";
        exit();
      }
    }
  }

  public function delete($id)
  {
    $id = (int)$id;
    $sinhvienModel = $this->model('sinhvienModel');
    $result = $sinhvienModel->delete($id);

    if ($result) {
      header("Location: /sinhvien/index");
      exit();
    } else {
      echo "Xoá sinh vien thất bại!";
      exit();
    }
  }
}
