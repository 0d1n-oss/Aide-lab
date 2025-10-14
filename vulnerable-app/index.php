<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>File Viewer</title>
</head>
<body>
    <h1>File Viewer</h1>
    <form method="GET">
        <input type="text" name="file" placeholder="Enter file path" size="50">
        <button type="submit">View</button>
    </form>
    <hr>
    <?php
    if (isset($_GET['file'])) {
        $file = $_GET['file'];
        
        if (file_exists($file)) {
            $content = file_get_contents($file);
            
            // Log para AIDE
            $logFile = '/var/www/shared/access.log';
            $logEntry = date('[Y-m-d H:i:s]') . " - File: $file | IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
            file_put_contents($logFile, $logEntry, FILE_APPEND);
            
            echo "<h3>File: " . htmlspecialchars($file) . "</h3>";
            echo "<pre>" . htmlspecialchars($content) . "</pre>";
        } else {
            echo "<p>File not found</p>";
        }
    }
    ?>
</body>
</html>
