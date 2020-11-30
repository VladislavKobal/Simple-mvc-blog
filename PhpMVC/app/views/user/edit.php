<?php
if ($this->registry['saved']) { echo '<p style="color:green">Зміни збережено</p>'; }
    else{}
$zamovlennya;
if (!empty($_SESSION['User'])) {
    $zamovlennya = unserialize($_SESSION['User']);
}
    ?>
<form class="form-horizontal" role="form" method="post" action="#">
    <input type="hidden" class="form-control" name="id" value="<?php echo $zamovlennya['customer_id']?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="last_name">Прізвище:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="last_name" value="<?php echo $zamovlennya["last_name"];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="first_name">Ім'я:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="first_name" value="<?php echo $zamovlennya["first_name"];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="telephone">Телефон:</label>
    <div class="col-sm-10">
        <input type="tel" class="form-control" name="telephone"  value="<?php echo $zamovlennya["telephone"];?>" required >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Емейл:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" value="<?php echo $zamovlennya["email"];?>" required>
    </div>
  </div>
     <div class="form-group">
    <label class="control-label col-sm-2" for="password">Пароль:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="password" value="<?php echo $zamovlennya["password"];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="city">Місто:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="city" value="<?php echo $zamovlennya["city"];?>">
    </div>
  </div>
  <div class="form-group">
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
        <button name="submit" type="submit" class="btn btn-default" value="submit">Зберегти зміни</button>
        <?php echo Helper::simpleLink('/user/reset', 'Оновити'); ?>
    </div>
  </div>
    <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
    </div>
  </div>
</form>