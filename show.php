<?php
require_once 'functions.php';

if (!isset($_GET['series'])) {
    header('Location: series.php');
    exit;
}

$seriesName = $_GET['series'];
$seriesDirectory = 'serietv/' . $seriesName . '/';
$seriesData = getTVSeries('serietv/');

// Trova la serie specifica
$currentShow = null;
foreach ($seriesData as $show) {
    if ($show['title'] === $seriesName) {
        $currentShow = $show;
        break;
    }
}

if (!$currentShow) {
    header('Location: series.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($seriesName) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1><?= htmlspecialchars($seriesName) ?></h1>
        <nav>
            <a href="series.php">← Torna alle serie</a>
        </nav>
    </header>

    <div class="seasons-container">
        <?php foreach ($currentShow['seasons'] as $season): ?>
            <div class="season">
                <h2><?= htmlspecialchars($season['name']) ?></h2>
                <div class="episodes-list">
                    <?php foreach ($season['episodes'] as $episode): ?>
                        <div class="episode">
                            <a href="player.php?file=<?= urlencode($episode['path']) ?>">
                                <?= htmlspecialchars($episode['name']) ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>