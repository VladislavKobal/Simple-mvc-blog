<?php
echo "<center>";
if (!empty($_SESSION['name'])) {
    echo "Доброго дня, " . $_SESSION['name'] . "<br>";
    echo Helper::simpleLink('/user/edit', 'Особистий кабінет');
} else {
    $username = $this->getModel('User')->getName(); ?>
    <p>Hello, <?php echo $username; ?></p><?php }
echo "</center>";