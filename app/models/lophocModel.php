<?php
require_once "../app/core/DB.php";
class lophocModel
{
  private $conn;
  public function __construct()
  {
    $this->conn = ConnectDB::Connect();
  }

  public function getAllLopHoc()
  {
    $query = "SELECT * FROM lophoc";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($MaLop, $TenLop, $SiSo, $GiaoVien)
  {
    $query = "INSERT INTO lophoc (MaLop, TenLop, SiSo, GiaoVien) VALUES (:MaLop, :TenLop, :SiSo, :GiaoVien)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MaLop', $MaLop);
    $stmt->bindParam(':TenLop', $TenLop);
    $stmt->bindParam(':SiSo', $SiSo, PDO::PARAM_INT);
    $stmt->bindParam(':GiaoVien', $GiaoVien);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function paging($limit = 5, $offset = 0, $search = "")
  {
    if ($search !== "") {
      $query = "SELECT * FROM lophoc WHERE MaLop LIKE :search OR TenLop LIKE :search LIMIT :limit OFFSET :offset";
      $stmt = $this->conn->prepare($query);
      $searchParam = "%" . $search . "%";
      $stmt->bindParam(':search', $searchParam);
      $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
      $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Tính tổng số bảng ghi theo điều kiện tìm kiếm
      $countQuery = "SELECT COUNT(*) FROM lophoc WHERE MaLop LIKE :search OR TenLop LIKE :search";
      $countStmt = $this->conn->prepare($countQuery);
      $countStmt->bindParam(':search', $searchParam);
      $countStmt->execute();
      $totalRecords = $countStmt->fetchColumn();
    } else {
      $query = "SELECT * FROM lophoc LIMIT :limit OFFSET :offset";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
      $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Tính tổng số bảng ghi
      $selectAllQuery = $this->conn->query("SELECT COUNT(*) FROM lophoc");
      $totalRecords = $selectAllQuery->fetchColumn();
    }

    $totalPages = ceil($totalRecords / $limit);

    return ['lophocs' => $result, 'totalPages' => $totalPages];
  }

  public function getLopHocById($id)
  {
    $query = "SELECT * FROM lophoc WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($id, $MaLop, $TenLop, $SiSo, $GiaoVien)
  {
    $query = "UPDATE lophoc SET MaLop = :MaLop, TenLop = :TenLop, SiSo = :SiSo, GiaoVien = :GiaoVien WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':MaLop', $MaLop);
    $stmt->bindParam(':TenLop', $TenLop);
    $stmt->bindParam(':SiSo', $SiSo, PDO::PARAM_INT);
    $stmt->bindParam(':GiaoVien', $GiaoVien);
    return $stmt->execute();
  }

  public function delete($id)
  {
    $query = "DELETE FROM lophoc WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }
}
