<h2>Sửa loại mô hình</h2>

<?php if (!empty($thongBao)): ?>
    <p style="color: red;">
        <?= htmlspecialchars($thongBao) ?>
    </p>
<?php endif; ?>

<?php if (!empty($loai)): ?>

    <form
        method="POST"
        action="index.php?action=sua&MaLoai=<?= urlencode($loai['MaLoai']) ?>"
    >
        <p>
            <label>Mã loại:</label><br>

            <input
                type="text"
                value="<?= htmlspecialchars($loai['MaLoai']) ?>"
                readonly
            >
        </p>

        <p>
            <label>Tên loại:</label><br>

            <input
                type="text"
                name="TenLoai"
                value="<?= htmlspecialchars($loai['TenLoai']) ?>"
                required
            >
        </p>

        <p>
            <label>Mô tả:</label><br>

            <input
                type="text"
                name="MoTa"
                value="<?= htmlspecialchars($loai['MoTa'] ?? '') ?>"
            >
        </p>

        <button type="submit">Lưu thay đổi</button>
        <a href="index.php">Quay lại</a>
    </form>

<?php else: ?>

    <p>Không tìm thấy loại mô hình cần sửa.</p>
    <a href="index.php">Quay lại danh sách</a>

<?php endif; ?>