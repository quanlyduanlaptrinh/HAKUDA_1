<?php

require_once __DIR__ . "/../Database.php";

class LoaiMoHinhModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy danh sách loại mô hình
    public function getAll()
    {
        $sql = "SELECT * FROM loaimohinh ORDER BY MaLoai ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // Lấy thông tin một loại mô hình
    public function getById($maLoai)
    {
        $sql = "SELECT * FROM loaimohinh
                WHERE MaLoai = :maLoai";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':maLoai' => $maLoai
        ]);

        return $stmt->fetch();
    }

    // Thêm loại mô hình
    public function them($maLoai, $tenLoai, $moTa)
    {
        $sql = "INSERT INTO loaimohinh
                (MaLoai, TenLoai, MoTa)
                VALUES (:maLoai, :tenLoai, :moTa)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':maLoai' => $maLoai,
            ':tenLoai' => $tenLoai,
            ':moTa' => $moTa
        ]);
    }

    // Sửa loại mô hình
    public function sua($maLoai, $tenLoai, $moTa)
    {
        $sql = "UPDATE loaimohinh
                SET TenLoai = :tenLoai,
                    MoTa = :moTa
                WHERE MaLoai = :maLoai";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':maLoai' => $maLoai,
            ':tenLoai' => $tenLoai,
            ':moTa' => $moTa
        ]);
    }

    // Xóa loại mô hình
    public function xoa($maLoai)
    {
        $sql = "DELETE FROM loaimohinh
                WHERE MaLoai = :maLoai";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':maLoai' => $maLoai
        ]);

        // Trả về true nếu có bản ghi thực sự bị xóa
        return $stmt->rowCount() > 0;
    }
}