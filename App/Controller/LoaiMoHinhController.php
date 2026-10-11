<?php

require_once __DIR__ . "/../Model/LoaiMoHinhModel.php";

class LoaiMoHinhController
{
    private $model;

    public function __construct()
    {
        $this->model = new LoaiMoHinhModel();
    }

    // Hiển thị danh sách
    public function danhSach()
    {
        return $this->model->getAll();
    }

    // Lấy thông tin một loại mô hình
    public function layThongTin($maLoai)
    {
        return $this->model->getById($maLoai);
    }

    // Thêm loại mô hình
    public function them($maLoai, $tenLoai, $moTa)
    {
        return $this->model->them($maLoai, $tenLoai, $moTa);
    }

    // Sửa loại mô hình
    public function sua($maLoai, $tenLoai, $moTa)
    {
        return $this->model->sua($maLoai, $tenLoai, $moTa);
    }

    // Xóa loại mô hình
    public function xoa($maLoai)
    {
        return $this->model->xoa($maLoai);
    }
}