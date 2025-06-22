<?php
require_once 'functions.php';

$filmDirectory = 'film/';  // Usa un collegamento simbolico a E:\Film
$allowedExtensions = ['mp4', 'avi', 'mkv', 'mov', 'webm', 'm4v'];

$movies = getMovies($filmDirectory, $allowedExtensions);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Locali</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>La Mia Collezione Film</h1>
    </header>

    <div class="movie-grid">
        <?php if (empty($movies)): ?>
            <p class="error">Nessun film trovato! Controlla il disco esterno.</p>
        <?php else: ?>
            <?php foreach ($movies as $movie): ?>
                <div class="movie-card">
                    <div class="movie-poster">
                        <span><?= htmlspecialchars($movie['name']) ?></span>
                    </div>
                    <h3><?= htmlspecialchars($movie['name']) ?></h3>
                    <a href="player.php?file=<?= urlencode($movie['path']) ?>">Guarda</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>