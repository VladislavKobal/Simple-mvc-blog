<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <?php
            $menu = Helper::getMenu();
            foreach ($menu as $item)  :
                ?>
                <li>
                    <?php
                    echo Helper::simpleLink($item['path'], $item['name']);


                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (!empty($_SESSION['name'])) {
                ?>
                <li><a><?php echo $_SESSION['name']; ?></a></li>
                <li><a href="<?php echo BP; ?>/user/logout/"><span class="glyphicon glyphicon-log-in"></span> Вийти</a>
                </li>
                <?php
            } else {
                ?>
                <li><a href="<?php echo BP; ?>/user/register/"><span class="glyphicon glyphicon-user"></span>
                        Зареєструватись</a></li>
                <li><a href="<?php echo BP; ?>/user/login/"><span class="glyphicon glyphicon-log-in"></span> Ввійти</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>