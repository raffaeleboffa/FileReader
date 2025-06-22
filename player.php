<?php
if (!isset($_GET['file']) || !file_exists($_GET['file'])) {
    header('Location: index.php');
    exit;
}

$filePath = $_GET['file'];
$fileName = pathinfo($filePath, PATHINFO_FILENAME);
$mimeType = mime_content_type($filePath);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($fileName) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="player-container">
        <h1><?= htmlspecialchars($fileName) ?></h1>
        <video controls autoplay>
            <source src="<?= htmlspecialchars($filePath) ?>" type="<?= $mimeType ?>">
            Il tuo browser non supporta il video.
        </video>
        <a href="index.php" class="back-button">← Torna alla lista</a>
    </div>
</body>
</html>