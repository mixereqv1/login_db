<?php
    function createMenu() {
        echo '<a href="index.php" class="link">Index.php</a>
        <a href="01.php" class="link">01.php</a>
        <a href="02.php" class="link">02.php</a>
        <a href="03.php" class="link">03.php</a>';
    }

    function showCurrentPage() {
        echo 'Strona -> '.basename($_SERVER['PHP_SELF']);
    }
?>