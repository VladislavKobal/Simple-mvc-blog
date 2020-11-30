<?php
if ($this->registry['saved']) {
    echo '<p style="color:green">Новину видалено</p>';
}
$product = $this->registry['Post'];
//    var_dump($product);
?>
<form class="form-horizontal" role="form" method="post" action="#">
    <center><h1><b>Ви дійсно бажаєте видалити новину?</b></h1></center>
    <input type="hidden" class="form-control" name="id" value="<?php echo $product['id'] ?>" disabled>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Заголовок новини:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name_article" value="<?php echo $product['name_article'] ?>"
                   disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="price">Короткий опис:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="short_description"
                   value="<?php echo $product['short_description'] ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="qty">Повний опис:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" value="<?php echo $product['description'] ?>"
                   disabled>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" value="submit" class="btn btn-default">Видалити
            </button> <?php echo "<a href='" . BP . "/post/list' class=\"btn btn-default\">Назад</a>"; ?>
        </div>
    </div>
</form>