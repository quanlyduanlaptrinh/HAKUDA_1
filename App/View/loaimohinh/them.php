<h2>Thêm loại mô hình</h2>

<?php if (!empty($thongBao)): ?>
    <p style="color: red;">
        <?= htmlspecialchars($thongBao) ?>
    </p>
<?php endif; ?>

<form method="POST" action="index.php?action=them">
    <p>
        <label>Mã loại:</label><br>
        <input type="text" name="MaLoai" required>
    </p>

    <p>
        <label>Tên loại:</label><br>
        <input type="text" name="TenLoai" required>
    </p>

    <p>
        <label>Mô tả:</label><br>
        <input type="text" name="MoTa">
    </p>

    <button type="submit">Thêm loại mô hình</button>
    <a href="index.php">Quay lại</a>
</form>