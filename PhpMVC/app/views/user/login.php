<form class="form-horizontal" role="form" method="post" action="#">
  <div class="form-group">
    <label class="control-label col-sm-2" for="telephone">Емейл:</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" name="email" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Пароль:</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" name="password" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Ввійти</button>
    </div>
  </div>

</form>