<?php

require_once __DIR__ . "/App/Controller/LoaiMoHinhController.php";

$controller = new LoaiMoHinhController();

$action = $_GET["action"] ?? "danhsach";

// Điều hướng về danh sách và hiển thị thông báo
function quayVeDanhSach($thongBao)
{
    header("Location: index.php?msg=" . urlencode($thongBao));
    exit;
}

switch ($action) {

    // HIỂN THỊ DANH SÁCH

    case "danhsach":

        $danhSach = $controller->danhSach();

        require __DIR__ . "/App/View/loaimohinh/danhsach.php";

        break;


    // THÊM LOẠI MÔ HÌNH
    case "them":

        $thongBao = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $maLoai = trim($_POST["MaLoai"] ?? "");
            $tenLoai = trim($_POST["TenLoai"] ?? "");
            $moTa = trim($_POST["MoTa"] ?? "");

            if ($maLoai === "" || $tenLoai === "") {

                $thongBao = "Vui lòng nhập mã loại và tên loại.";

            } else {

                try {

                    $controller->them($maLoai, $tenLoai, $moTa);

                    quayVeDanhSach("Thêm loại mô hình thành công.");

                } catch (PDOException $e) {

                    $thongBao = "Không thể thêm dữ liệu. Mã loại có thể đã tồn tại.";
                }
            }
        }

        require __DIR__ . "/App/View/loaimohinh/them.php";

        break;

    // SỬA LOẠI MÔ HÌNH
    case "sua":

        $maLoai = trim($_GET["MaLoai"] ?? "");
        $thongBao = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $tenLoai = trim($_POST["TenLoai"] ?? "");
            $moTa = trim($_POST["MoTa"] ?? "");

            if ($maLoai === "" || $tenLoai === "") {

                $thongBao = "Vui lòng nhập tên loại.";

            } else {

                try {

                    $controller->sua($maLoai, $tenLoai, $moTa);

                    quayVeDanhSach("Cập nhật loại mô hình thành công.");

                } catch (PDOException $e) {

                    $thongBao = "Không thể cập nhật dữ liệu.";
                }
            }
        }

        $loai = $controller->layThongTin($maLoai);

        require __DIR__ . "/App/View/loaimohinh/sua.php";

        break;


  
    // XÓA LOẠI MÔ HÌNH
  
    case "xoa":

        $maLoai = trim($_GET["MaLoai"] ?? "");

        if ($maLoai === "") {

            quayVeDanhSach("Mã loại không hợp lệ.");

        }

        try {

            $ketQua = $controller->xoa($maLoai);

            if ($ketQua) {

                quayVeDanhSach("Xóa loại mô hình thành công.");

            } else {

                quayVeDanhSach("Không tìm thấy loại mô hình cần xóa.");
            }

        } catch (PDOException $e) {

            quayVeDanhSach(
                "Không thể xóa. Dữ liệu có thể đang được sử dụng ở bảng khác."
            );
        }

        break;



    default:

        header("Location: index.php");

        exit;
}