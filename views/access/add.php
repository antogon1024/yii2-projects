<? 
//$this->registerJsFile('/js/accesses/accesses.js');
use yii\helpers\Html; 
?>
<ul class="nav nav-pills">
  <li role="presentation"><a href="/access/index">Список доступов</a></li>
  <li role="presentation" class="active"><a href="/access/add">Добавить доступ</a></li>
</ul>

<form action="/access/add" method="post">
  <div class="form-group">
    <label for="name">Имя</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  
  <div class="form-group">
    <label for="login">Логин:</label>
    <input type="text" class="form-control" id="login" name="login">
  </div>
  
  <div class="form-group">
    <label for="password">Пароль:</label>
    <input type="text" class="form-control" id="password" name="password">
  </div>
  
  <div class="form-group">
    <label for="email">Емайл:</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  
  <div class="form-group">
    <label for="site">Сайт:</label>
    <input type="text" class="form-control" id="site" name="site">
  </div>
  
  <div class="form-group">
    <label for="group">Группа:</label>
    <input type="text" class="form-control" id="group" name="group">
  </div>
  
   <div class="form-group">
    <label for="addition">Дополнения:</label>
    <textarea id="addition" name="addition" class="form-control"></textarea>
  </div>
  
  <div class="form-group">
    <button type="submit" class="btn btn-default">Сохранить</button>
  </div>
  
  <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
  
</form>

