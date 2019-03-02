<?php
$this->registerCssFile("@web/css/mod_cabinet/clients/ctariff.css");
?>

<div class="uk-width-large-3-10">
    <div class="uk-panel uk-panel-box ant-shadow antm-grid-1">
        <?php include __DIR__ . '/_sidebar.php'; ?>
    </div>
</div>
<div class="uk-width-large-5-10">
    <div class="uk-panel uk-panel-box ant-shadow">

        <h4 class="uk-text-bold antm-caption">ОБЩАЯ ИНФОРМАЦИЯ</h4>
        <span class="uk-text-small uk-text-bold ant-color-1">Тариф. Остаток посещений. Действие абонемента.</span>
        <hr class="antm-hr-1">

        <div class="uk-text-bold ant-margin-1">Тариф:</div>

        <ul class="uk-grid uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 uk-text-left"
            data-uk-grid-margin="">
            <?php foreach ($data['tariffs'] as $k => $v): ?>
                <?php if ($data['user']['tariff'] == $v['name']): ?>
                    <li>
                        <div class="uk-panel uk-panel-box ant-panel-box ant-panel-box-active">
                            <div class="ant-tariff-active"><?= $v['name'] ?></div>
                            <div class="uk-text-small uk-text-bold ant-color-1">Ваш тариф</div>
                        </div>
                    </li>
                <?php else: ?>
                    <li>
                        <div class="uk-panel uk-panel-box ant-box-1 ant-panel-box">
                            <div class="ant-tariff"><?= $v['name'] ?></div>
                            <?php if ($data['user']['payment'] == 0): ?>
                                <div name="<?= $v['name'] ?>" duration="<?= $v['duration'] ?>"
                                     extend="<?= $v['max_extend'] ?>" freeze="<?= $v['max_freeze'] ?>"
                                     access="<?= $v['access'] ?>" visits="<?= $v['visits'] ?>"
                                     price="<?= $v['price'] ?>" class="uk-text-small uk-text-bold ant-color-2">
                                    Активировать
                                </div>
                            <?php else: ?>
                                <div name="<?= $v['name'] ?>" duration="<?= $v['duration'] ?>"
                                     extend="<?= $v['max_extend'] ?>" freeze="<?= $v['max_freeze'] ?>"
                                     class="uk-text-small uk-text-bold ant-color-2"
                                     data-uk-modal="{target:'#modal3', center:true}">Активировать
                                </div>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <?php if ($data['user']['tariff'] != false): ?>

            <?php if ($data['user']['payment'] == 1 && $data['user']['freeze_flag'] == 1): ?>
                <div class="uk-text-small uk-text-bold ant-red">
                    Действие тарифа приостановлено с <?= $data['user']['freeze_start1'] ?>
                    по <?= $data['user']['freeze_end1'] ?>
                </div>
                <hr class="antm-hr-2">

                <div>
                    <form action="/cabinet/my-tariff" method="post">
                        <input type="hidden" name="freeze_start" value="<?= $data['user']['freeze_start'] ?>">
                        <input type="hidden" name="freeze_end" value="<?= $data['user']['freeze_end'] ?>">
                        <input type="hidden" name="freeze" value="<?= $data['user']['freeze'] ?>">
                        <input type="hidden" name="user_id2" value="<?= $data['user']['user_id'] ?>">
                        <input type="hidden" name="unfreeze" value="1">
                        <button id="freeze-2" class="uk-text-bold ant-button-1 uk-text-small" type="submit" value="1">
                            Разморозить абонимент
                        </button>
                    </form>
                </div>

            <?php endif; ?>

            <?php if ($data['user']['payment'] == 1 && $data['user']['freeze_flag'] == 0): ?>
                <div class="uk-text-small uk-text-bold" style="margin-top: 10px;">
                    <span class="ant-color-1">Действует с <?= $data['user']['start2'] ?>
                        по <?= $data['user']['end2'] ?></span>
                    <span id="ant-extend-1" data-uk-modal="{target:'#modal1', center:true}">Продлить</span>
                </div>
                <hr class="antm-hr-2">

                <div>
                    <button id="freeze" class="uk-text-bold ant-button-1 uk-text-small" type="button" value="1"
                            data-uk-modal="{target:'#modal2', center:true}">
                        Заморозить абонимент
                    </button>
                </div>
            <?php endif; ?>

            <?php if ($data['user']['payment'] == 0 && $data['user']['freeze_flag'] == 0 && $data['user']['tariff'] != ''): ?>
                <div class="uk-text-small uk-text-bold ant-red">
                    <!--Ожидается оплата-->
                    <form id="ant-kassa-pay-2" action="https://money.yandex.ru/eshop.xml" method="post">
                        <input name="shopId" value="516143" type="hidden"/>
                        <input name="scid" value="747221" type="hidden"/>
                        <input name="customerNumber" value="<?= $data['user']['email'] ?>" type="hidden"/>
                        <input id="antc-price" name="sum" value="" type="hidden"/>

                        <input name="shopSuccessURL" value="https://vsevcrossfit.ru/pay/success.php" type="hidden"/>
                        <input name="shopFailURL" value="https://vsevcrossfit.ru/pay/fail.php" type="hidden"/>

                        <input name="cps_email" value="<?= $data['user']['email'] ?>" type="hidden"/>
                        <input name="full_name" value="<?= $data['user']['full_name'] ?>" type="hidden"/>
                        <input name="duration" value="<?= $data['user']['duration']; ?>" type="hidden"/>
                        <input name="user_id" value="<?= $data['user']['user_id'] ?>" type="hidden"/>

                        <input id="antc-tariff" name="tariff" value="<?= $data['user']['name'] ?>" type="hidden"/>

                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="uk-panel uk-panel-box ant-shadow">

        <h4 class="22uk-panel-title uk-text-bold antm-caption">ТАРИФЫ</h4>
        <span class="uk-text-small uk-text-bold ant-color-1">Информация по тарифам.</span>
        <hr class="antm-hr-1">


        <ul class="uk-grid uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 uk-text-left ant-ul-1"
            data-uk-grid-margin="">
            <?php foreach ($data['tariffs'] as $k => $v): ?>

                <li class="uk-text-center ant-block-1">
                    <div class="uk-text-small uk-text-bold ant-color-3" style="padding-bottom:5px;">Тариф:</div>
                    <div class="ant-border-1">
                        <?php if ($v['active'] == 1): ?>
                            <div style="font-size:22px; text-transform: uppercase;"
                                 class="uk-text-bold ant-tariff-active"><?= $v['name'] ?></div>
                        <?php else: ?>
                            <div style="font-size:22px; text-transform: uppercase;"
                                 class="uk-text-bold"><?= $v['name'] ?></div>
                        <?php endif; ?>

                        <div class="uk-text-small uk-text-bold ant-color-3">Срок действия <?= $v['duration'] ?>мес
                        </div>

                        <div class="uk-text-small uk-text-bold ant-color-3">Доступ
                            к <?= $v['access'] ?> <?= $v['club'] ?></div>
                        <div class="uk-text-small uk-text-bold ant-color-3">Не более <?= $v['visits'] ?> раз<br> в одном
                            клубе
                        </div>

                        <div class="ant-price"><?= $v['price'] ?> руб</div>

                    </div>

                    <div class="ant-border-2">
                        <?php if ($data['user']['tariff'] == $v['name']): ?>
                            <button id="asd1" class="ant-button-2 uk-text-small" type="button">Активирован</button>
                            <br>
                            <div class="ant-color-4">Действует с <?= $data['user']['start2'] ?>
                                по <?= $data['user']['end2'] ?></div>

                        <?php else: ?>
                            <button name="<?= $v['name'] ?>" duration="<?= $v['duration'] ?>"
                                    extend="<?= $v['max_extend'] ?>" freeze="<?= $v['max_freeze'] ?>"
                                    access="<?= $v['access'] ?>" visits="<?= $v['visits'] ?>"
                                    class="uk-text-bold ant-button-3 uk-text-small" type="button" value="1">
                                Активировать
                            </button>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<div id="modal1" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: scroll;">
    <div class="uk-modal-dialog" style="width:400px;background:#EBF8FC;">
        <a href="" class="uk-modal-close uk-close"></a>

        <center class="ant-modal-1">Для вашего тарифа максимально на <?= $data['user']['extend'] ?> дней</center>
        <center style="margin:30px 0px;">
            <input id="ant-extend-count" type="text" style="border:1px solid #aaa;border-radius:5px;" value="">
        </center>
        <center>
            <button id="ant-extend-2" class="ant-button-2 uk-text-small" type="button">Продлить абонемент</button>
        </center>
    </div>
</div>

<div id="modal2" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: scroll;">
    <div class="uk-modal-dialog" style="width:400px;background:#EBF8FC;">
        <a href="" class="uk-modal-close uk-close"></a>

        <center class="ant-modal-1">Для вашего тарифа максимально на <?= $data['user']['freeze'] ?> дней</center>
        <center style="margin:30px 0px;">
            <b>с</b> <input id="ant-date-1" data-uk-datepicker="{format:'DD.MM.YYYY'}" type="text"
                            class="ant-datepicker-1">
            <b>по</b> <input id="ant-date-2" data-uk-datepicker="{format:'DD.MM.YYYY'}" type="text"
                             class="ant-datepicker-1">

            <div id="ant-message-1" class="uk-alert uk-alert-danger uk-text-small uk-text-bold">Поля дат не могут быть
                пустыми!
            </div>
            <div id="ant-message-2" class="uk-alert uk-alert-danger uk-text-small uk-text-bold">
                Первая дата не должна быть больше второй!
            </div>
            <div id="ant-message-3" class="uk-alert uk-alert-danger uk-text-small uk-text-bold">
                Даты должны быть в пределах <?= $data['user']['start'] ?> - <?= $data['user']['end'] ?> !
            </div>

            <div id="ant-message-4" class="uk-alert uk-alert-danger uk-text-small uk-text-bold">
                Вы можете заморозить абонемент максимально на <?= $data['user']['freeze'] ?> дней!
            </div>
        </center>
        <center>
            <button id="ant-freeze-1" class="ant-button-2 uk-text-small" type="button">Заморозить абонемент</button>
        </center>
    </div>
</div>

<div id="modal3" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: scroll;">
    <div class="uk-modal-dialog" style="width:400px;background:#EBF8FC;">
        <a href="" class="uk-modal-close uk-close"></a>

        <center class="ant-modal-1">Поменять тариф можно после окончания действия текущего тарифа.</center>

    </div>
</div>

<input type="hidden" id="ant-extend-hidden" value="<? //=$data['user']['extend']?>">
<input type="hidden" id="ant-start1-hidden" value="<? //=$data['user']['start1']?>">
<input type="hidden" id="ant-end1-hidden" value="<? //=$data['user']['end1']?>">
<input type="hidden" id="ant-end-hidden" value="<? //=$data['user']['end']?>">
<input type="hidden" id="ant-freeze-hidden" value="<? //=$data['user']['freeze']?>">
<input type="hidden" id="ant-payment-hidden" value="<? //=$data['user']['payment']?>">
