<?php
if (function_exists('mysqli_connect')) {
    echo "MySQLi extension is enabled and properly configured.";
} else {
    echo "MySQLi extension is NOT enabled or configured correctly.";
}
?>
