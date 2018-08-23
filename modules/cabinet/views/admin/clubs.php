<?php
$this->registerCssFile("@web/css/mod_cabinet/admin/clubs.css");
use yii\widgets\LinkPager;

?>


<div class="uk-width-large-3-10">
    <div class="22uk-panel uk-panel-box ant-shadow antm-grid-1">
        <?php include __DIR__ . '/_sidebar.php'; ?>
    </div>
</div>

<div id="ant-list-1" class="uk-width-large-7-10">
    <div class="uk-panel uk-panel-box ant-shadow" style="padding:15px;">
        <ul id="ant-width"
            class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2 uk-text-left"
            data-uk-grid-margin="">
            <li id="ant-width-1" class="uk-text-bold">
                <div style="position:relative;">
                    <div id="ant-angle-1">
                        <span>Сортировать:</span> <span id="ant-enter"><?php //=$this->filter?></span>
                        <span id="ant-angle-2" class="uk-icon-angle-down"></span>
                    </div>
                    <div class="ant-list-1" style="position:absolute;z-index:100;">
                        <p filter="name">Имя</p>

                        <p filter="create">Дата подключения</p>
                    </div>
                </div>
            </li>
            <li id="ant-width-2" class="uk-text-right">
                <span style="position:relative;">
					<input id="ant-search-1" type="text">
					<span class="uk-icon-search"></span>
				</span>
            </li>
        </ul>
    </div>


    <ul class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 uk-text-left"
        data-uk-grid-margin="">
        <?php //if( $this->search == 1 && empty($this->data) ):?>
        <!-- <center style="width:100%;font-weight:bold;">Ничего не найдено.</center> -->
        <?php //endif; ?>

        <?php foreach ($res['data'] as $k => $v): ?>

            <li class="ant-li-1 uk-grid-margin">
                <div class="uk-panel uk-panel-box ant-shadow uk-text-center" style="position:relative;">
                    <div class="ant-block-1">
					<span id="<?= $v['id'] ?>" class="ant-icon-cog ant-edit-1">
						<span class="uk-icon-cog"></span>
					</span>

                        <div style="display:none" class="ant-data" field="icon"><?= $v['icon'] ?></div>
                        <img class="ant-icon-1" src="/images/mod_cabinet/clubs/<?= $v['icon'] ?>" height="90"
                             width="90">

                        <div class="ant-label-1">клуб</div>
                        <div class="ant-name-1 ant-data" field="name"><?= $v['name'] ?></div>
                        <div class="ant-clients">
                            <span class="ant-clients-1"><?= $v['all_clients'] ?></span>
                            <span class="ant-clients-3">|</span>
                            <span class="ant-clients-2"><?= $v['active_clients'] ?></span>
                        </div>
                        <input type="hidden" id="ant-email-1" value="<?= $v['admin'] ?>">
                    </div>

                    <div class="ant-info-1 ant-shadow" style="">
                        <div class="ant-small-1">Подключен к системе:</div>
                        <div class="ant-margin-1 ant-data" field="create"><?php //=$v['create3']?></div>
                        <div class="ant-data" field="create2" style="display:none;"><?php //=$v['create2']?></div>

                        <div class="ant-small-1">Прибыль:</div>
                        <div class="ant-margin-1 ant-data" field="income"><?= $v['income'] ?></div>

                        <?php if ($v['price'] != ''): ?>
                            <?php if (strstr($v['price'], '%')): ?>
                                <div class="ant-small-1">Процент клуба от тарифа:</div>
                            <?php else: ?>
                                <div class="ant-small-1">Цена одного посещения:</div>
                            <?php endif; ?>
                            <div class="ant-margin-1 ant-data" field="price"><?= $v['price'] ?></div>
                        <?php endif; ?>

                        <div class="ant-small-1">Клиентов в базе:</div>
                        <div class="ant-margin-1 ant-data" field="all_clients"><?= $v['all_clients'] ?></div>

                        <div class="ant-small-1">Действующие подписки:</div>
                        <div class="ant-margin-1 ant-data" field="active_clients"><?= $v['active_clients'] ?></div>

                        <div class="ant-small-1">Администратор клуба:</div>
                        <div class="ant-margin-1 ant-data" field="admin"><?= $v['admin'] ?></div>

                        <div class="ant-small-1">Контакты клуба:</div>
                        <div class="ant-margin-1 ant-data" field="contacts"><?= $v['contacts'] ?></div>

                        <div class="ant-small-1">Адрес:</div>
                        <div class="ant-address ant-data" field="address"><?= $v['address'] ?></div>

                        <div class="ant-padding-1 ant-margin-2">
                            <button id="<?= $v['id'] ?>" class="ant-button-1 ant-delete-1" type="button"
                                    data-uk-modal="{target:'#modal1', center:true}">Удалить
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <div style="text-align: center">
        <?= LinkPager::widget([
            'pagination' => $res['pages'],
            'maxButtonCount' => 5,
            'nextPageLabel' => 'Вперед',
            'prevPageLabel' => 'Назад',
            //'nextPageCssClass' => 'css-class',
            //'prevPageCssClass' => 'css-class'
        ]); ?>
    </div>

</div>


<div id="ant-create-2" class="uk-width-large-5-10">
    <div class="22uk-panel uk-panel-box ant-shadow">
        <div class="antm-block-1" style="margin-bottom:20px;">
            <h4 class="222uk-panel-title uk-text-bold antm-caption">ДОБАВЛЕНИЕ КЛУБА</h4>
        </div>

        <form id="ant-form-main" name="form" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ant-form-1" value="1">
            <input type="hidden" name="ids" value="">

            <div class="uk-text-small uk-text-bold ant-color-3 margin-top-1">Название клуба:</div>
            <div class="ant-block-2">
                <input id="ant-name-1" class="ant-input-1" type="text" name="name">

                <div class="ant-errors ant-error-1"></div>
            </div>

            <div id="ant-price-2" class="uk-text-small uk-text-bold ant-color-3 margin-top-1">Цена одного посещения:
            </div>

            <div class="ant-block-2">
                <input id="ant-price-1" class="ant-input-1" type="text" name="price">

                <div class="ant-errors ant-error-6"></div>
            </div>

            <div class="uk-text-small uk-text-bold ant-color-3 margin-top-1">Контакты клуба:</div>
            <div class="ant-block-2">
                <textarea id="ant-contacts" class="ant-textarea-1" name="contacts"></textarea>

                <div class="ant-errors ant-error-7"></div>
            </div>

            <div class="uk-text-small uk-text-bold ant-color-3 margin-top-1">Адрес:</div>
            <div class="ant-block-2">
                <textarea id="ant-address" class="ant-textarea-1" name="address"></textarea>

                <div class="ant-errors ant-error-8"></div>
            </div>

            <div class="uk-text-small uk-text-bold ant-color-3 margin-top-1">Администратор клуба (email):</div>
            <div class="ant-block-2">
                <input id="ant-admin-1" class="ant-input-1" type="text" name="admin">

                <div class="ant-errors ant-error-6"></div>
            </div>

            <div class="uk-text-small uk-text-bold ant-color-3 margin-top-1">Логин:</div>
            <div class="ant-block-2">
                <input id="ant-login-1" class="ant-input-1" type="text" name="username">

                <div class="ant-errors ant-error-13"></div>
            </div>

            <div id="ant-password-3" class="uk-text-small uk-text-bold ant-color-3 margin-top-1">Пароль:</div>
            <div class="ant-block-2">
                <input id="ant-password-1" class="ant-input-1" type="text" name="password1">

                <div class="ant-errors ant-error-11"></div>
            </div>

            <div class="uk-text-small uk-text-bold ant-color-3 margin-top-1">Повторите пароль:</div>
            <div class="ant-block-2">
                <input id="ant-password-2" class="ant-input-1" type="text" name="password2">

                <div class="ant-errors ant-error-12"></div>
            </div>

            <div id="2upload-drop" class="2uk-placeholder">
                <a class="uk-form-file" style="text-decoration:none;">
                    <div class="uk-text-small uk-text-bold ant-color-4 margin-top-1">Загрузить изображение:</div>
                    <input id="upload-select" type="file" name="avatar">
                </a>

                <div>
                    <input name="icon" id="ant-avatar-1" class="ant-input-1" type="text" style="cursor:text;" readonly>

                    <div class="ant-errors ant-error-9"></div>
                </div>
            </div>

            <input id="ant-club-add" class="ant-button-3" type="submit" value="Сохранить">
            <input id="ant-cancel-1" class="ant-button-3" type="button" value="Отменить">
            <?php //echo JHtml::_('form.token');?>
        </form>
    </div>
</div>





