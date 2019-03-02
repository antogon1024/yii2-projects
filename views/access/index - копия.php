<?php
//$this->registerJsFile('/js/accesses/accesses.js', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('/js/access/access.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
//['depends' => [\yii\web\JqueryAsset::className()]]
?>

<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="/access/index">Список доступов</a></li>
  <li role="presentation"><a href="/access/add">Добавить доступ</a></li>
</ul>

<div style="margin:40px 0;">
  <form action="/access/index" method="post" id="ant-form-1" class="form-horizontal">
    <label for="inputEmail3" class="22col-sm-2 22control-label">Фильтр</label>
    <select id="inputEmail3" class="form-control" style="width:300px;display:inline;" name="filter">
   
	  <? foreach($filter as $k=>$v): ?>
	  <?if($v['active'] == 1):?>
	  
	  <option selected value="<?=$v['value']?>"><?=$v['name']?></option>
	  
	  <? else: ?>
	  
	   <option value="<?=$v['value']?>"><?=$v['name']?></option>
	   
	  <? endif; ?>
	  <? endforeach; ?>
	  
    </select> 
	<button type="submit" class="btn btn-default">Сохранить</button>
	<input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
  </form>
</div>

<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Имя</th>
      <th>Логин</th>
      <th>Пароль</th>
      <th>Емайл</th>
      <th>Сайт</th>
      <th>Дополн.</th>
      <th>Группа</th>
      </tr>
  </thead>
  <tbody>
  <? foreach($data as $v): ?>
    <tr>
      <td class="ant-name"><?=$v['name']?></td>
      <td><?=$v['login']?></td>
      <td><?=$v['password']?></td>
      <td><?=$v['email']?></td>
      <td><?=$v['site']?></td>
      <td><?=$v['addition']?></td>
      <td><?=$v['group']?></td>
    </tr>
  <? endforeach; ?>
  </tbody>
</table>

