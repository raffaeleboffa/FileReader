<?php
// Funzione per ottenere i film (come prima)
function getMovies($directory, $extensions) {
    $movies = [];
    
    if (!is_dir($directory)) return $movies;

    $files = scandir($directory);
    
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        $filePath = $directory . $file;
        if (is_dir($filePath)) continue; // Ignora le cartelle
        
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        
        if (in_array($ext, $extensions)) {
            $movies[] = [
                'name' => pathinfo($file, PATHINFO_FILENAME),
                'path' => $filePath,
                'type' => mime_content_type($filePath)
            ];
        }
    }
    
    return $movies;
}

// Nuova funzione per ottenere le serie TV
function getTVSeries($baseDir) {
    $series = [];
    $allowedExtensions = ['mp4', 'avi', 'mkv', 'mov'];
    
    if (!is_dir($baseDir)) return $series;

    $showFolders = scandir($baseDir);
    
    foreach ($showFolders as $show) {
        if ($show === '.' || $show === '..') continue;
        
        $showPath = $baseDir . $show . '/';
        if (!is_dir($showPath)) continue;
        
        // Cerca stagioni (S01, S02, o direttamente episodi)
        $seasons = [];
        $seasonFolders = scandir($showPath);
        
        foreach ($seasonFolders as $season) {
            if ($season === '.' || $season === '..') continue;
            
            $seasonPath = $showPath . $season . '/';
            if (is_dir($seasonPath)) {
                // È una cartella stagione (es. "S01")
                $episodes = getMovies($seasonPath, $allowedExtensions);
                if (!empty($episodes)) {
                    $seasons[] = [
                        'name' => $season,
                        'episodes' => $episodes
                    ];
                }
            } else {
                // Potrebbe essere un episodio direttamente nella cartella della serie
                $ext = strtolower(pathinfo($season, PATHINFO_EXTENSION));
                if (in_array($ext, $allowedExtensions)) {
                    $seasons[] = [
                        'name' => 'Episodi',
                        'episodes' => [[
                            'name' => pathinfo($season, PATHINFO_FILENAME),
                            'path' => $showPath . $season,
                            'type' => mime_content_type($showPath . $season)
                        ]]
                    ];
                }
            }
        }
        
        if (!empty($seasons)) {
            $series[] = [
                'title' => $show,
                'seasons' => $seasons
            ];
        }
    }
    
    return $series;
}
?>