<?php
require_once 'functions.php';

$seriesDirectory = 'serietv/';
$series = getTVSeries($seriesDirectory);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serie TV</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Le Mie Serie TV</h1>
        <nav>
            <a href="index.php">Film</a> | 
            <a href="series.php">Serie TV</a>
        </nav>
    </header>

    <div class="series-grid">
        <?php if (empty($series)): ?>
            <p class="error">Nessuna serie trovata! Controlla la cartella.</p>
        <?php else: ?>
            <?php foreach ($series as $show): ?>
                <div class="show-card">
                    <div class="show-poster">
                        <span><?= htmlspecialchars($show['title']) ?></span>
                    </div>
                    <h2><?= htmlspecialchars($show['title']) ?></h2>
                    <a href="show.php?series=<?= urlencode($show['title']) ?>">Vedi episodi</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>