<?php

function logRequestTime() {
    $currentTime = date("d.m.Y H:i:s");

    $logFile = "log/log.txt";

    if (file_exists($logFile)) {
        $lineCount = count(file($logFile));
        if ($lineCount >= 10) {
            $i = 0;
            while (file_exists("log/archive/log{$i}.txt")) {
                $i++;
            }
            rename($logFile, "log/archive/log{$i}.txt");
        }
    }

    file_put_contents($logFile, "Last request: $currentTime\n", FILE_APPEND);
}

echo logRequestTime();

?>
