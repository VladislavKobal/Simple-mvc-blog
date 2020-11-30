<?php
if ($this->registry['saved']) {
    echo '<p style="color:green">Новину збережено</p>';
}
$product = $this->registry['Post'];
?>
<form class="form-horizontal" role="form" method="post" action="#">
    <input type="hidden" class="form-control" name="id" value="<?php echo $product['id'] ?>">
    <div class="form-group">
        <label class="control-label col-sm-2" for="sku">Заголовок новини:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name_article" value="<?php echo $product['name_article'] ?>"
                   required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Короткий опис:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="short_description"
                   value="<?php echo $product['short_description'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="price">Повний опис:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" value="<?php echo $product['description'] ?>"
                   required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Зберегти
            </button> <?php echo "<a href='" . BP . "/product/list' class=\"btn btn-default\">Назад</a>"; ?>
        </div>
    </div>
</form>