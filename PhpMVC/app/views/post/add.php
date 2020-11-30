<?php
if ($this->registry['saved']) {
    echo '<p style="color:green">Новину збережено</p>';
} else {
}
?>
<form class="form-horizontal" role="form" method="post" action="#">
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Заголовок новини:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name_article">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="short_description">Опис:</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="short_description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description">Опис:</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button name="submit" type="submit" class="btn btn-default" value="submit">Зберегти
            </button> <?php echo "<a href='" . BP . "/product/list' class=\"btn btn-default\">Назад</a>"; ?>
        </div>
    </div>
</form>