<?php

require_once './vendor/autoload.php';

echo '<html>';
echo '<body>';
echo '<script type="text/javascript">';

echo "var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log(\"Connection established!\");
};

conn.onmessage = function(e) {
    console.log(e.data);
};";
echo '</script>';
echo '</body>';
echo '</html>';