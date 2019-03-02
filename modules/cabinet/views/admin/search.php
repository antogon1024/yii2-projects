<?php
use yii\widgets\Pjax;
use yii\helpers\Html;

?>



<div id="ant-list-1" class="uk-width-large-7-10">


    <div class="uk-panel uk-panel-box ant-shadow" style="padding:15px;margin-bottom:40px;">
        <ul id="ant-width"
            class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2 uk-text-left"
            data-uk-grid-margin="">
            <li id="ant-width-1" class="uk-text-bold">
                <div style="position:relative;">
                    <div id="ant-angle-1">
                        <span>Сортировать: </span> <span id="ant-enter"><?php //=$this->filter?></span>
                        <span id="ant-angle-2" class="uk-icon-angle-down"></span>
                    </div>
                    <div class="ant-list-1" style="position:absolute;z-index:100;">
                        <p filter="tariff">Тариф</p>

                        <p filter="full_name">Имя</p>

                        <p filter="registerDate">Новые</p>

                    </div>
                </div>

            </li>
            <li id="ant-width-2" class="uk-text-right">
                <span style="position:relative;"><input id="ant-search-1" type="text"><span
                        class="uk-icon-search"></span></span>
            </li>
        </ul>
    </div>


    <ul class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 uk-text-left"
        data-uk-grid-margin="">
        <?php //if( $this->search == 1 && empty($this->data) ):?>
        <center style="width:100%;font-weight:bold;">Ничего не найдено.</center>


        <?php //endif; ?>


        <?php //foreach ($data as $k2 => $v2){} ?>
        <?php //endforeach; ?>


        <?php Pjax::begin(); ?>
        <a id="aaa" class="btn btn-lg btn-primary" href="/cabinet/admin/search">Обновить3</a>

        <p>Время сервера: <?= $time ?></p>
        <?php Pjax::end(); ?>

    </ul>

</div>


<div id="ant-create-2" class="uk-width-large-5-10">


    <div class="uk-panel-box ant-shadow">
        <div class="antm-block-1">
            <h4 id="ant-capt2" class="222uk-panel-title uk-text-bold antm-caption">СОЗДАНИЕ НОВОГО АККАУНТА</h4>
        </div>

        <form id="ant-register-client" name="form" action="/cabinet/register-client" method="post"
              enctype="multipart/form-data">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>"
                   value="<?= Yii::$app->request->getCsrfToken(); ?>"/>
            <input id="ant-edit" type="hidden" name="edit" value="0">
            <input id="ant-unique-username" type="hidden" name="unique-username" value="0">
            <input id="ant-unique-email" type="hidden" name="unique-email" value="0">
            <input id="ant-user_id" type="hidden" name="user_id">
            <input id="ant-id" type="hidden" name="id">

            <div id="ant-wrap-form-1">
                <input type="hidden" name="Clients[role]" value="client">


                <div class="ant-block-1 ant-inline">
                    <div class="uk-text-small uk-text-bold ant-title-field">
                        <span class="ant-title">Фамилия</span><span class="ant-required"></span>
                    </div>
                    <input id="ant-full_name1" class="ant-input-1" type="text" name="Clients[full_name1]">

                    <div class="ant-errors error-full_name1"></div>
                </div>
                <div class="ant-block-1 ant-inline ant-inline-center">
                    <div class="uk-text-small uk-text-bold ant-title-field">
                        <span class="ant-title">Имя</span><span class="ant-required"></span>
                    </div>
                    <input id="ant-full_name2" class="ant-input-1" type="text" name="Clients[full_name2]">

                    <div class="ant-errors error-full_name2"></div>
                </div>
                <div class="ant-block-1 ant-inline">
                    <div class="uk-text-small uk-text-bold ant-title-field">
                        <span class="ant-title">Отчество</span><span class="ant-required"></span>
                    </div>
                    <input id="ant-full_name3" class="ant-input-1" type="text" name="Clients[full_name3]">

                    <div class="ant-errors error-full_name3"></div>
                </div>
                <div class="ant-block-1 ant-inline">
                    <div class="uk-text-small uk-text-bold ant-title-field">Число рождения<span
                            class="ant-required"></span></div>
                    <select class="form-control" name="Clients[birth_day]" id="ant-birth_day" validate="true">
                        <option value="0">день</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>

                    <div class="ant-errors error-birth_day"></div>
                </div>
                <div class="ant-block-1 ant-inline ant-inline-center">
                    <div class="uk-text-small uk-text-bold ant-title-field">Месяц рождения<span
                            class="ant-required"></span></div>
                    <select class="form-control" name="Clients[birth_month]" id="ant-birth_month" validate="true">
                        <option value="0">месяц</option>
                        <option value="1">января</option>
                        <option value="2">февраля</option>
                        <option value="3">марта</option>
                        <option value="4">апреля</option>
                        <option value="5">мая</option>
                        <option value="6">июня</option>
                        <option value="7">июля</option>
                        <option value="8">августа</option>
                        <option value="9">сентября</option>
                        <option value="10">октября</option>
                        <option value="11">ноября</option>
                        <option value="12">декабря</option>
                    </select>

                    <div class="ant-errors error-birth_month"></div>
                </div>
                <div class="ant-block-1 ant-inline">
                    <div class="uk-text-small uk-text-bold ant-title-field"><span
                            class="ant-title">Год рождения</span><span class="ant-required"></span></div>
                    <select class="form-control" name="Clients[birth_year]" id="ant-birth_year" validate="true">
                        <option value="0">год</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>
                        <option value="1956">1956</option>
                        <option value="1955">1955</option>
                        <option value="1954">1954</option>
                        <option value="1953">1953</option>
                        <option value="1952">1952</option>
                        <option value="1951">1951</option>
                        <option value="1950">1950</option>
                        <option value="1949">1949</option>
                        <option value="1948">1948</option>
                        <option value="1947">1947</option>
                        <option value="1946">1946</option>
                        <option value="1945">1945</option>
                        <option value="1944">1944</option>
                        <option value="1943">1943</option>
                    </select>

                    <div class="ant-errors error-birth_year"></div>
                </div>

                <div class="ant-block-1 ant-inline2 ant-inline-left">
                    <div class="uk-text-small uk-text-bold ant-title-field"><span class="ant-title">Телефон</span><span
                            class="ant-required"></span></div>
                    <input id="ant-phone" class="ant-input-1 ant-data" field="phone" type="text" name="Clients[phone]">

                    <div class="ant-errors error-phone"></div>
                </div>


                <div class="ant-block-1 ant-inline2">
                    <div class="uk-text-small uk-text-bold ant-title-field">Логин<span class="ant-required"></span>
                    </div>
                    <input id="ant-username" class="ant-input-1" type="text" name="Clients[username]">

                    <div class="ant-errors error-username"></div>
                </div>

                <div class="ant-block-1 ant-inline2 ant-inline-left">
                    <div class="uk-text-small uk-text-bold ant-title-field">Пароль<span class="ant-required"></span>
                    </div>
                    <input id="ant-password1" class="ant-input-1" type="password" name="Clients[password1]">

                    <div class="ant-errors error-password1"></div>
                </div>
                <div class="ant-block-1 ant-inline2">
                    <div class="uk-text-small uk-text-bold ant-title-field">Повторите пароль<span
                            class="ant-required"></span></div>
                    <input id="ant-password2" class="ant-input-1" type="password" name="Clients[password2]">

                    <div class="ant-errors error-password2"></div>
                </div>

                <div class="ant-block-1 ant-inline2 ant-inline-left">
                    <div class="uk-text-small uk-text-bold ant-title-field">Адрес электронной почты<span
                            class="ant-required"></span></div>
                    <input id="ant-email" class="ant-input-1" type="text" name="Clients[email]">

                    <div class="ant-errors error-email"></div>
                </div>


                <div class="ant-block-1 ant-inline2">
                    <!-- <a class="uk-form-file" style="text-decoration:none;">
                         <div class="uk-text-small uk-text-bold ant-color-4 ant-title-field">Загрузить аватар<span class="ant-required"></span></div>
                         <input id="upload-select" type="file" name="Clients[avatar]">
                     </a>-->
                    <div>
                        <input name="avatar1" id="ant-avatar-1" class="ant-input-1" type="text" style="cursor:text;"
                               readonly="">

                        <div class="ant-errors error-avatar"></div>
                    </div>


                </div>
                <div style="clear:left;"></div>

                <input id="ant-field-form" type="hidden"
                       value="full_name1,full_name2,full_name3,birth_day,birth_month,birth_year,phone,login,email,password-1,password-2,avatar">
                <input type="hidden" name="group" value="2">

            </div>

            <button id="ant-registration-client" type="button"
                    class="2ant-btn 2ant-btn-primary 2ant-btn-lg ant-button-3">Сохранить
            </button>
            <input id="ant-cancel-1" class="ant-button-3" type="button" value="Отменить">
        </form>

    </div>
</div>


<script>
    aaa.onclick = function () {
        alert('Спасибо');
    };
</script>