<form class="form-horizontal" role="form" method="post" action="#">
  <div class="form-group">
    <label class="control-label col-sm-2" for="last_name">Прізвище:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="last_name" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="first_name">Ім'я:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="first_name" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="telephone">Телефон:</label>
    <div class="col-sm-10">
        <input type="tel" class="form-control" name="telephone" required ">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Пароль:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password"  required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="confirm_password">Пароль(підтвердження):</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="confirm_password"  required>
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="city">Місто:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="city" >
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
        <button name="submit" value="submit" type="submit" class="btn btn-default">Реєстрація</button>
    </div>
  </div>

</form>