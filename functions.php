<?php
function getMovies($directory, $extensions) {
    $movies = [];
    
    if (!is_dir($directory)) {
        return $movies;
    }

    $files = scandir($directory);
    
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        $filePath = $directory . $file;
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
?>