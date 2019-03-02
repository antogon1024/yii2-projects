<?php
   //ini_set ('mbstring.encoding_translation', 'off' );
   //use yii\bootstrap\ActiveForm;
?>



<div id="amc-popup-fon"></div>
<div id="ant-wrapper">
   <div id="amc-popup-login" style="display:none">
      <span class="uk-icon-close ant-close"></span>
      <div class="ant-divider">
         <h4 class="222uk-panel-title uk-text-bold antm-caption">ВОЙТИ:</h4>
      </div>
      <div id="ant-soc-button">
         <span id="ant-soc-1" class="ant-sbutton" name="vk">
         <a href="http://oauth.vk.com/authorize?client_id=6734084&amp;redirect_uri=https://vsevcrossfit.ru/cabinet/registration?provider=vk&amp;response_type=code">
         <img src="/images/mod_cabinet/social/vk.png" width="32">
         </a>
         </span>
         <span id="ant-soc-2" class="ant-sbutton" name="ok">
         <a href="http://www.odnoklassniki.ru/oauth/authorize?client_id=1272185856&amp;response_type=code&amp;redirect_uri=https://vsevcrossfit.ru/cabinet/registration?provider=ok">
         <img src="/images/mod_cabinet/social/ok.png" width="32">
         </a>
         </span>
         <span id="ant-soc-3" class="ant-sbutton" name="ya" tform="login">
         <a href="https://oauth.yandex.ru/authorize?response_type=code&amp;client_id=ee1438132cb049608002445c2956fca1&amp;display=popup">
         <img src="/images/mod_cabinet/social/ya.png" width="32">
         </a>
         </span>
         <span id="ant-soc-4" class="ant-sbutton" name="gg">
         <a href="https://accounts.google.com/o/oauth2/auth?redirect_uri=https://vsevcrossfit.ru/cabinet/registration?provider=agg&amp;response_type=code&amp;client_id=682672245933-t5tkjruiieog3dea8dvmfqabb56hotgh.apps.googleusercontent.com&amp;scope=https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile">
         <img src="/images/mod_cabinet/social/gg.png" width="32">
         </a>
         </span>
         <span id="ant-soc-5" class="ant-sbutton" name="fb">
         <a href="https://www.facebook.com/dialog/oauth?client_id=1015803118601971&amp;redirect_uri=https://vsevcrossfit.ru/cabinet/registration?provider=afb&amp;response_type=code">
         <img src="/images/mod_cabinet/social/fb.png" width="32">
         </a>
         </span>
      </div>
      <div class="ant-or-container">
         <hr class="ant-or-hr">
         <div class="ant-or">ИЛИ</div>
      </div>
      <form id="ant-avto-1" class="uk-form" name="form1" action="/cabinet/login" method="post">
         <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
         <input type="hidden" name="ant-form-2" value="1">
         <div class="uk-text-small uk-text-bold ant-title-field"><span class="ant-required">Логин</span></div>
         <div class="ant-block-1"><input id="ant-username-1" class="ant-input-1" type="text" name="LoginForm[username]"></div>
         <div class="uk-text-small uk-text-bold  ant-title-field"><span class="ant-required">Пароль</span></div>
         <div><input id="ant-password-1" class="ant-input-1" type="password" name="LoginForm[password]"></div>
        
         <div 222style="color:red;font-weight:bold;" class="ant-errors"></div>
         <div class="ant-field-help">
            <a href="/cabinet/recovery">Забыли пароль?</a>
         </div>
         <div style="clear:right;">
            <button id="ant-club-add" type="submit" class="ant-btn ant-btn-primary ant-btn-lg">Войти</button>
            <div style="display:inline-block">
				<input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked="" aria-invalid="false">
               <!--<div id="" class="ant-checkbox-a2">
                  <div class="ant-checkbox-b2 ant-checkbox-1"></div>
               </div>-->
               <span>Запомнить меня</span>
            </div>
         </div>
         <input id="ant-remember" name="remember" type="hidden" value="0">
         <input type="hidden" name="b8c5a4f00e5e0af445a24c95d5eb2bcc" value="1">		
      </form>
   </div>

   <div id="amc-popup-register" style="display:none">
      <span class="uk-icon-close ant-close"></span>
      <div id="ant-wrap-social2">
         <div class="ant-divider">
            <h4 class="222uk-panel-title uk-text-bold antm-caption">РЕГИСТРИРОВАТЬ КАК:</h4>
            <div style="margin-top:15px;">
               <div id="" class="ant-checkbox-a">
                  <div id="ant-checkbox-1" class="ant-checkbox-b "></div>
               </div>
               <span style="font-size:16px;font-weight:400;">Клиент клуба</span>
            </div>
            <div>
               <div id="" class="ant-checkbox-a">
                  <div id="ant-checkbox-2" class="ant-checkbox-b "></div>
               </div>
               <span style="font-size:16px;font-weight:400;">Администратор клуба</span>
            </div>
         </div>
         <div id="ant-soc-button">
            <span id="ant-soc-6" class="ant-sbutton">
            <a href="http://oauth.vk.com/authorize?client_id=6734084&amp;redirect_uri=https://vsevcrossfit.ru/cabinet/registration?provider=vk&amp;response_type=code">
            <img src="/images/mod_cabinet/social/vk.png" width="32">
            </a>
            </span>
            <span id="ant-soc-7" class="ant-sbutton">
            <a href="http://www.odnoklassniki.ru/oauth/authorize?client_id=1272185856&amp;response_type=code&amp;redirect_uri=https://vsevcrossfit.ru/cabinet/registration?provider=ok">
            <img src="/images/mod_cabinet/social/ok.png" width="32">
            </a>
            </span>
            <span id="ant-soc-8" class="ant-sbutton">
            <a href="https://oauth.yandex.ru/authorize?response_type=code&amp;client_id=ee1438132cb049608002445c2956fca1&amp;display=popup">
            <img src="/images/mod_cabinet/social/ya.png" width="32">
            </a>
            </span>
            <span id="ant-soc-9" class="ant-sbutton">
            <a href="https://accounts.google.com/o/oauth2/auth?redirect_uri=https://vsevcrossfit.ru/cabinet/registration?provider=agg&amp;response_type=code&amp;client_id=682672245933-t5tkjruiieog3dea8dvmfqabb56hotgh.apps.googleusercontent.com&amp;scope=https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile">
            <img src="/images/mod_cabinet/social/gg.png" width="32">
            </a>
            </span>
            <span id="ant-soc-10" class="ant-sbutton">
            <a href="https://www.facebook.com/dialog/oauth?client_id=1015803118601971&amp;redirect_uri=https://vsevcrossfit.ru/cabinet/registration?provider=afb&amp;response_type=code">
            <img src="/images/mod_cabinet/social/fb.png" width="32">
            </a>
            </span>
         </div>
         <div class="ant-or-container">
            <hr class="ant-or-hr">
            <div class="ant-or">ИЛИ</div>
         </div>
      </div>
      <div id="ant-wrap-social3" style="display:none">
         <div style="margin-top:-5px;margin-bottom:20px;">
            <div id="" class="ant-checkbox-a1">
               <div id="ant-checkbox-3" class="ant-checkbox-b"></div>
            </div>
            <span></span>
         </div>
         <p>Для продолжения регистрации необходимо заполнить недостающие поля</p>
      </div>


      <form id="ant-register-client" name="form" action="/cabinet/register-client" method="post" enctype="multipart/form-data">
         <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
         <input id="ant-edit" type="hidden" name="edit" value="0">
         <input id="ant-unique-username" type="hidden" name="unique-username" value="1">
         <input id="ant-unique-email" type="hidden" name="unique-email" value="1">
         <div id="ant-wrap-form-1">
            <input type="hidden" name="Clients[role]" value="client">

            <div class="ant-block-1 ant-inline">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Фамилия</span><span class="ant-required"></span>
               </div>
               <input id="ant-full_name-1" class="ant-input-1" type="text" name="Clients[full_name1]">
               <div class="ant-errors error-full_name1"></div>
            </div>
            <div class="ant-block-1 ant-inline ant-inline-center">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Имя</span><span class="ant-required"></span>
               </div>
               <input id="ant-full_name-2" class="ant-input-1" type="text" name="Clients[full_name2]">
               <div class="ant-errors error-full_name2"></div>
            </div>
            <div class="ant-block-1 ant-inline">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Отчество</span><span class="ant-required"></span>
               </div>
               <input id="ant-full_name-3" class="ant-input-1" type="text" name="Clients[full_name3]">
               <div class="ant-errors error-full_name3"></div>
            </div>
            <div class="ant-block-1 ant-inline">
               <div class="uk-text-small uk-text-bold ant-title-field">Число рождения<span class="ant-required"></span></div>
               <select class="form-control" name="Clients[birth_day]" id="birth_day" validate="true">
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
               <div class="uk-text-small uk-text-bold ant-title-field">Месяц рождения<span class="ant-required"></span></div>
               <select class="form-control" name="Clients[birth_month]" id="birth_month" validate="true">
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
               <div class="uk-text-small uk-text-bold ant-title-field"><span class="ant-title">Год рождения</span><span class="ant-required"></span></div>
               <select class="form-control" name="Clients[birth_year]" id="birth_year" validate="true">
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
               <div class="uk-text-small uk-text-bold ant-title-field"><span class="ant-title">Телефон</span><span class="ant-required"></span></div>
               <input id="ant-phone-1" class="ant-input-1 ant-data" field="phone" type="text" name="Clients[phone]">
               <div class="ant-errors error-phone"></div>
            </div>


            <div class="ant-block-1 ant-inline2">
               <div class="uk-text-small uk-text-bold ant-title-field">Логин<span class="ant-required"></span></div>
               <input id="ant-login-1" class="ant-input-1" type="text" name="Clients[username]">
               <div class="ant-errors error-username"></div>
            </div>
			
            <div class="ant-block-1 ant-inline2 ant-inline-left">
               <div class="uk-text-small uk-text-bold ant-title-field">Пароль<span class="ant-required"></span></div>
               <input id="ant-password-2" class="ant-input-1" type="password" name="Clients[password1]">
               <div class="ant-errors error-password1"></div>
            </div>
            <div class="ant-block-1 ant-inline2">
               <div class="uk-text-small uk-text-bold ant-title-field">Повторите пароль<span class="ant-required"></span></div>
               <input id="ant-password-3" class="ant-input-1" type="password" name="Clients[password2]">
               <div class="ant-errors error-password2"></div>
            </div>

			<div class="ant-block-1 ant-inline2 ant-inline-left">
               <div class="uk-text-small uk-text-bold ant-title-field">Адрес электронной почты<span class="ant-required"></span></div>
               <input id="ant-email-1" class="ant-input-1" type="text" name="Clients[email]">
               <div class="ant-errors error-email"></div>
            </div>

            <div class="ant-block-1 ant-inline2">
               <a class="uk-form-file" style="text-decoration:none;">
                  <div class="uk-text-small uk-text-bold ant-color-4 ant-title-field">Загрузить аватар<span class="ant-required"></span></div>
                  <input id="upload-select" type="file" name="Clients[avatar]">
               </a>
               <div>
                  <input name="Clients[photo]" id="ant-avatar-1" class="ant-input-1" type="text" style="cursor:text;" readonly="">
                  <!--<div class="ant-errors error-photo"></div>-->
                  <div class="ant-errors error-file"></div>
               </div>






            </div>
			<div style="clear:left;"></div>
			
            <input id="ant-field-form" type="hidden" value="full_name1,full_name2,full_name3,birth_day,birth_month,birth_year,phone,login,email,password-1,password-2,avatar">
            <input type="hidden" name="group" value="2">

         </div>

         <button id="ant-registration-client" type="button" class="ant-btn ant-btn-primary ant-btn-lg 2ant-button-3">Сохранить</button>
      </form>


      <form id="ant-register-club" name="form" action="/cabinet/register-club" method="post" enctype="multipart/form-data">
         <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
         <input type="hidden" name="RegisterClub[role]" value="club_admin">

         <div class="ant-block-1">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Название клуба</span>
                  <span class="ant-required"></span>
               </div>
               <input id="ant-name-1" class="ant-input-1" type="text" name="RegisterClub[name]">
               <div class="ant-errors error-name"></div>
            </div>

            <div class="ant-block-1">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Администратор клуба (email)</span>
                  <span class="ant-required"></span>
               </div>
               <input id="ant-email-1" class="ant-input-1" type="text" name="RegisterClub[email]">
               <div class="ant-errors error-email"></div>
            </div>

            <div class="ant-block-1">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Логин</span>
                  <span class="ant-required"></span>
               </div>
               <input id="ant-login-1" class="ant-input-1" type="text" name="RegisterClub[username]">
               <div class="ant-errors error-username"></div>
            </div>

            <div class="ant-block-1">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Пароль</span>
                  <span class="ant-required"></span>
               </div>
               <input class="ant-input-1" type="password" name="RegisterClub[password1]">
               <div class="ant-errors error-password1"></div>
            </div>

            <div class="ant-block-1">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Повторите пароль</span>
                  <span class="ant-required"></span>
               </div>
               <input class="ant-input-1" type="password" name="RegisterClub[password2]">
               <div class="ant-errors error-password2"></div>
            </div>

            <div class="ant-block-1">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Контакты клуба</span>
                  <span class="ant-required"></span>
               </div>
               <textarea name="RegisterClub[contacts]" id="ant-contacts-1" class="ant-textarea-1" rows="10"></textarea>
               <div class="ant-errors error-contacts"></div>
            </div>

            <div class="ant-block-1">
               <div class="uk-text-small uk-text-bold ant-title-field">
                  <span class="ant-title">Адрес</span>
                  <span class="ant-required"></span>
               </div>
               <textarea name="RegisterClub[address]" id="ant-address-1" class="ant-textarea-1" rows="10"></textarea>
               <div class="ant-errors error-address"></div>
            </div>

            <div class="ant-block-1">
               <a class="uk-form-file" style="text-decoration:none;">
                  <div class="uk-text-small uk-text-bold ant-color-4 ant-title-field">
                     <span class="ant-title">Аватар клуба</span>
                     <span class="ant-required" style="display: inline;"></span>
                  </div>
                  <input id="upload-select-1" type="file" name="RegisterClub[logo]">
               </a>
               <div>
                  <input name="RegisterClub[icon]" id="ant-avatar-2" class="ant-input-1" type="text" style="cursor:text;" readonly="">

                  <div class="ant-errors error-icon"></div>
                  <div class="ant-errors error-logo"></div>
               </div>
            </div>


            <button id="ant-registration-club" type="button" class="ant-btn ant-btn-primary ant-btn-lg 2ant-button-3">Сохранить</button>
      </form>
   </div>

</div>
