<h2>Danh sách loại mô hình</h2>

<p>
    <a href="index.php?action=them">+ Thêm loại mô hình</a>
</p>

<?php if (!empty($_GET['msg'])): ?>
    <p style="color: green;">
        <?= htmlspecialchars($_GET['msg']) ?>
    </p>
<?php endif; ?>

<table
    border="1"
    cellpadding="10"
    cellspacing="0"
    style="width: 100%; border-collapse: collapse;"
>
    <thead>
        <tr style="background-color: #eeeeee;">
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Mô tả</th>
            <th style="width: 150px;">Thao tác</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($danhSach)): ?>

            <?php foreach ($danhSach as $loai): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($loai['MaLoai']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($loai['TenLoai']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($loai['MoTa'] ?? '') ?>
                    </td>

                    <td style="white-space: nowrap;">
                        <a href="index.php?action=sua&MaLoai=<?= urlencode($loai['MaLoai']) ?>">
                            Sửa
                        </a>

                        |

                        <a
                            href="index.php?action=xoa&MaLoai=<?= urlencode($loai['MaLoai']) ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa loại mô hình này không?');"
                        >
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center;">
                    Chưa có loại mô hình nào.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>