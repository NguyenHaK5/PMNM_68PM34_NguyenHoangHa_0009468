<?php
require_once "../app/core/DB.php";
class sinhvienModel
{
  private $conn;
  public function __construct()
  {
    $this->conn = ConnectDB::Connect();
  }

  public function getAllSinhVien()
  {
    $query = "SELECT * FROM sinhvien";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($MSSV, $HoTen, $GioiTinh, $MaLop = null)
  {
    $query = "INSERT INTO sinhvien (MSSV, HoTen, GioiTinh, MaLop) VALUES ( :MSSV, :HoTen, :GioiTinh, :MaLop )";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MSSV', $MSSV);
    $stmt->bindParam(':HoTen', $HoTen);
    $stmt->bindParam(':GioiTinh', $GioiTinh);
    $stmt->bindParam(':MaLop', $MaLop);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function paging($limit = 10, $offset = 0, $search = "", $maLop = "")
  {
    $conditions = [];
    $params = [];

    if ($search !== "") {
      $conditions[] = "(sv.HoTen LIKE :search OR sv.MSSV LIKE :search)";
      $params[':search'] = '%' . $search . '%';
    }
    if ($maLop !== "") {
      $conditions[] = "sv.MaLop = :malop";
      $params[':malop'] = $maLop;
    }
    $whereSql = $conditions ? ('WHERE ' . implode(' AND ', $conditions)) : '';

    $query = "SELECT sv.*, lh.TenLop
              FROM sinhvien sv
              LEFT JOIN lophoc lh ON sv.MaLop = lh.MaLop
              $whereSql
              ORDER BY sv.id ASC
              LIMIT :limit OFFSET :offset";
    $stmt = $this->conn->prepare($query);
    foreach ($params as $key => $value) {
      $stmt->bindValue($key, $value);
    }
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $countQuery = "SELECT COUNT(*) FROM sinhvien sv $whereSql";
    $countStmt = $this->conn->prepare($countQuery);
    foreach ($params as $key => $value) {
      $countStmt->bindValue($key, $value);
    }
    $countStmt->execute();
    $totalRecords = (int)$countStmt->fetchColumn();

    $totalPages = $limit > 0 ? (int)ceil($totalRecords / $limit) : 1;

    return [
      'sinhviens' => $result,
      'totalPages' => $totalPages,
      'totalRecords' => $totalRecords,
    ];
  }

  public function getSinhVienById($id)
  {
    $query = "SELECT * FROM sinhvien WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($id, $MSSV, $HoTen, $GioiTinh, $MaLop = null)
  {
    $query = "UPDATE sinhvien SET MSSV = :MSSV, HoTen = :HoTen, GioiTinh = :GioiTinh, MaLop = :MaLop WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':MSSV', $MSSV);
    $stmt->bindParam(':HoTen', $HoTen);
    $stmt->bindParam(':GioiTinh', $GioiTinh);
    $stmt->bindParam(':MaLop', $MaLop);
    return $stmt->execute();
  }

  public function delete($id)
  {
    $query = "DELETE FROM sinhvien WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }
}
