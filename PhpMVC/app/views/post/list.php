<style type="text/css">
    .prod {
        padding-left: 300px;
        margin-top: -220;
    }

    block-images-grid {
        padding: 15px;
        padding-left: 70px;
        position: absolute;
    }
</style>
<div class="product">
    <p>
        <?php echo Helper::simpleLink('/post/add', 'Додати новину'); ?>
    </p>
</div>
<?php
$products = $this->registry['products'];
if (filter_input(INPUT_POST, 'search') || count($products) == 1) {
    ?>
    <div class="container">
        <div class="shadow">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                <div class="box-customn">
                    <div class="imfo-area">
                        <h3><?php echo $products[0]['name_article'] ?></h3>
                    </div>
                    <div class="imfo-area">
                        <p><?php echo $products[0]['short_description'] ?></p>
                        <p>
                            <?php echo Helper::simpleLink('/post/edit', 'Редагувати', array('id' => $products[0]['id'])); ?>
                        </p>
                        <p>
                            <?php echo Helper::simpleLink('/post/delete', 'Видалити', array('id' => $products[0]['id'])); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <?php
        $total_rows = $this->registry['total_rows'];
        $total_pages = $this->registry["total_pages"];
        $page = $this->registry["page"];
        foreach ($products as $product)  :
            ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <div class="box-customn">
                    <h3>
                        <p>
                            <?php echo Helper::simpleLink('/post/byid', $product['name_article'], array('id' => $product['id'])); ?>
                        </p>
                        <p><?php echo $product['short_description'] ?></p>
                        <span><?php echo $product['create_data'] ?></span>
                        <div class="imfo-area">

                            <p>
                                <?php echo Helper::simpleLink('/post/edit', 'Редагувати', array('id' => $product['id'])); ?>
                            </p>
                            <p>
                                <?php echo Helper::simpleLink('/post/delete', 'Видалити', array('id' => $product['id'])); ?>
                            </p>
                        </div>
                </div>
            </div>
        <?php endforeach;
        ?>
    </div>
    <ul class="pagination">
        <li><a href="?page=1">Перша</a></li>
        <li class="<?php if ($page <= 1) {
            echo 'disabled';
        } ?>">
            <a href="<?php if ($page <= 1) {
                echo '#';
            } else {
                echo "?page=" . ($page - 1);
            } ?>">Попередня</a>
        </li>
        <li class="<?php if ($page >= $total_pages) {
            echo 'disabled';
        } ?>">
            <a href="<?php if ($page >= $total_pages) {
                echo '#';
            } else {
                echo "?page=" . ($page + 1);
            } ?>">Наступна</a>
        </li>
        <li><a href="?page=<?php echo $total_pages; ?>">Остання</a></li>
    </ul>
    <?php
} ?>

