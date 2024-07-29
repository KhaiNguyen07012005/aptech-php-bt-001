<!-- /*Form Input  */ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập Điểm Học Sinh</title>
    
</head>
<body>
    <h1>Nhập Thông Tin Học Sinh</h1>
    <form action="formoutput.php" method="post">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <fieldset>
                <legend>Học Sinh <?= $i ?></legend>
                <label for="name<?= $i ?>">Tên:</label>
                <input type="text" id="name<?= $i ?>" name="name<?= $i ?>" required>
                <label for="score<?= $i ?>">Điểm:</label>
                <input type="number" id="score<?= $i ?>" name="score<?= $i ?>" min="0" max="10" step="0.1" required>
            </fieldset>
            <br>
        <?php endfor; ?>
        <button type="submit">Gửi</button>
    </form>
</body>
</html>
