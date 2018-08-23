<?php
//echo Yii::$app->basePath.'/modules/cabinet/views/layouts/_form.php'; exit;

?>


<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="/web/crossfit/img/favicon.ico">
      <!--<link rel="apple-touch-icon-precomposed" href="/templates/yootheme/vendor/yootheme/theme/platforms/joomla/assets/images/apple-touch-icon.png">-->
      <meta charset="utf-8" />
    
	  <meta name="author" content="Super User" />
      <meta name="generator" content="Joomla! - Open Source Content Management" />
      <title>Единый кроссфит абонемент в Санкт-Петербурге</title>
	  
     
       <link href="https://cdn.jsdelivr.net/leaflet/1.0.2/leaflet.css" rel="stylesheet" id="leaflet-css" />

	  <link href="/web/crossfit/css/mod_cabinet.css" rel="stylesheet" />
     <link href="/web/crossfit/css/theme.9.css" rel="stylesheet" id="theme-style-css" />
      <link href="/web/crossfit/css/leaflet.css" rel="stylesheet" id="leaflet-css" />

      <style>
         #rstbox_1 .rstbox-close:hover {
         color: rgba(128, 128, 128, 1) !important;
         }	
         */#page\#1 .uk-grid {     background: url(images/yootheme/home-header-splash.png) 50% 50% no-repeat;     background-size: contain;     padding: 135px 0; } /* 
      </style>
    
	<script src="/web/js/mod_cabinet/jquery.min.js"></script>
	<script src="/web/js/mod_cabinet/main.js"></script>
	  
	  <script src="/web/crossfit/js/uikit.min.js"></script>
      <script src="/web/crossfit/js/theme.js"></script>
	 <script src="/web/crossfit/js/leaflet.js" defer></script>
      <script src="/web/crossfit/js/map.min.js" defer></script>

    
   </head>
   <body class="">
      <div class="uk-offcanvas-content">
         <div class="tm-page">
            <div class="tm-header-mobile uk-hidden@m">
               <nav class="uk-navbar-container" uk-navbar>
                  <div class="uk-navbar-left">
                     <a class="uk-navbar-toggle" href="#tm-mobile" uk-toggle>
                        <div uk-navbar-toggle-icon></div>
                     </a>
                  </div>
                  <div class="uk-navbar-center">
                     
					 
					 <a class="uk-navbar-item uk-logo 11111" href="https://vsevcrossfit.ru">
                     <img src="/web/crossfit/img/logo-2e284236.png" srcset="/web/crossfit/img/logo-2e284236.png 202w, /web/crossfit/cache/logo-ee4ac2d8.png 260w" sizes="(min-width: 202px) 202px" data-width="260" data-height="58" alt="Vsevcrossfit">        </a>
                  </div>
               </nav>
               <div id="tm-mobile" uk-offcanvas mode="slide" overlay>
                  <div class="uk-offcanvas-bar">
                     <button class="uk-offcanvas-close" type="button" uk-close></button>
                     <div class="uk-child-width-1-1" uk-grid>
                        <div>
                           <div class="uk-panel" id="module-0">
                              <ul class="uk-nav uk-nav-default">
                                 <li class="uk-active"><a href="/cabinet">Г</a></li>
                                
                                
                                 <li class="uk-parent">
                                    <a href="/cabinet">Кабинет</a>
                              
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tm-header uk-visible@m" uk-header>
               <div uk-sticky media="768" cls-active="uk-navbar-sticky" sel-target=".uk-navbar-container">
                  <div class="uk-navbar-container">
                     <div class="uk-container">
                        <nav class="uk-navbar" uk-navbar="{&quot;align&quot;:&quot;center&quot;,&quot;boundary&quot;:&quot;!.uk-navbar-container&quot;}">
                           <div class="uk-navbar-left">
                           
							  
							  <a href="https://vsevcrossfit.ru" class="uk-navbar-item uk-logo 2222222">
                              <img src="http://yii2b/web/crossfit/img/logo-2e284236.png" srcset="/web/crossfit/cache/logo-2e284236.png 202w, /web/crossfit/cache/logo-ee4ac2d8.png 260w" sizes="(min-width: 202px) 202px" data-width="260" data-height="58" alt="Vsevcrossfit">
							  
							  <img src="http://yii2b/web/crossfit/img/logo-w-f4bc6480.png" srcset="/web/crossfit/cache/logo-w-f4bc6480.png 202w, /web/crossfit/cache/logo-w-8b67c87c.png 260w" sizes="(min-width: 202px) 202px" data-width="260" data-height="58" class="uk-logo-inverse" alt="Vsevcrossfit"></a>
                           </div>
                           <div class="uk-navbar-center">
                              <ul class="uk-navbar-nav">
								<li><a href="/">Home</a></li>
                                 <li class="uk-active"><a href="/cabinet">Crossfit</a></li>
                                 <li><a href="/cabinet/entry">Кабинет</a></li>
                              </ul>
                           </div>
                           <div class="uk-navbar-right">
                              <div class="uk-navbar-item" id="module-121">
								<ul id="ant-oauth">
									<? if(Yii::$app->user->isGuest): ?>
										<li><a href="#" class="acm-login ant-btn ant-btn-primary">Войти</a></li>
										<li><a href="#" class="acm-registr ant-btn ant-btn-primary">Регистрация</a></li>
									<? else :?>
										<li><a href="/cabinet/logout" class="acm-logout ant-btn ant-btn-primary">Выйти</a></li>
									<? endif; ?>
								</ul>    
                                </div>
                            </div>
                       
                              <div class="uk-navbar-item" id="module-tm-1">
                                 <div class="custom" ></div>
                              </div>
                           </div>
                        </nav>
                  </div>
               </div>
            </div>
            <div id="system-message-container"></div>
            <div id="page#1" class="uk-section-secondary" uk-scrollspy="{&quot;target&quot;:&quot;[uk-scrollspy-class]&quot;,&quot;cls&quot;:&quot;uk-animation-slide-top&quot;,&quot;delay&quot;:false}" tm-header-transparent="light" tm-header-transparent-placeholder>
               <div data-src="/web/crossfit/cache/afisha_krossfit-7f06cfb8.jpeg" data-srcset="/web/crossfit/cache/afisha_krossfit-a446a3f4.jpeg 768w, /web/crossfit/cache/afisha_krossfit-076754e0.jpeg 1024w, /web/crossfit/cache/afisha_krossfit-7349393d.jpeg 1366w, /web/crossfit/cache/afisha_krossfit-ddecf277.jpeg 1600w, /web/crossfit/cache/afisha_krossfit-7f06cfb8.jpeg 1920w" data-sizes="(min-width: 1920px) 1920px" uk-img class="uk-background-norepeat uk-background-cover uk-background-bottom-center uk-section uk-section-large uk-flex uk-flex-middle" style="background-color: #1e3040;" uk-height-viewport="offset-top: true;offset-bottom: 20">
                  <div class="uk-width-1-1">
                     <div class="uk-container">
                        <div class="uk-grid-margin" uk-grid>
                           <div class="uk-width-1-1@m">
                              <h1 class="uk-margin-small uk-h5" uk-scrollspy-class>
                                 Кроссфит без границ    
                              </h1>
                              <h1 class="uk-margin-small uk-h1" uk-scrollspy-class>
                                 Единый абонемент для залов<br/>функционального многоборья<br/>и кроссфита    
                              </h1>
                              <div class="uk-margin-small uk-text-lead" uk-scrollspy-class="uk-animation-slide-bottom">
                                 <p>Купите и пользуйтесь в любом из 35 залов Санкт-Петербурга</p>
                              </div>
                           </div>
                        </div>
                        <div class="uk-margin" uk-grid>
                           <div class="uk-width-1-1@m">
                              <div class="uk-margin" uk-scrollspy-class>
                                 <a class="el-content uk-button uk-button-primary uk-button-large" href="#clubs" uk-scroll>
                                 <span class="uk-text-middle">Список клубов</span>
                                 <span uk-icon="location"></span>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="uk-section-default uk-section-overlap" uk-scrollspy="{&quot;target&quot;:&quot;[uk-scrollspy-class]&quot;,&quot;cls&quot;:&quot;uk-animation-slide-top-medium&quot;,&quot;delay&quot;:false}">
               <div data-src="/web/crossfit/cache/home-explore-ac6965ee.jpeg" data-srcset="/web/crossfit/cache/home-explore-33b6525f.jpeg 768w, /web/crossfit/cache/home-explore-6250c416.jpeg 1024w, /web/crossfit/cache/home-explore-167ea9cb.jpeg 1366w, /web/crossfit/cache/home-explore-b8db6281.jpeg 1600w, /web/crossfit/cache/home-explore-ac6965ee.jpeg 1920w" data-sizes="(min-width: 1920px) 1920px" uk-img class="uk-background-norepeat uk-background-cover uk-background-bottom-center uk-section">
                  <div class="uk-container">
                     <div class="uk-grid-margin" uk-grid>
                        <div class="uk-width-1-1@m">
                           <h2 class="uk-text-center uk-h2" uk-scrollspy-class>
                              Как работает абонемент    
                           </h2>
                           <div  class="uk-divider-icon" uk-scrollspy-class></div>
                        </div>
                     </div>
                     <div class="uk-margin" uk-grid>
                        <div class="uk-width-1-1@m">
                           <div class="uk-text-center uk-child-width-1-1 uk-child-width-1-4@m uk-grid-small" uk-grid="masonry: true">
                              <div>
                                 <div uk-scrollspy-class class="el-item uk-card uk-card-hover uk-card-body">
                                    <img data-src="/web/crossfit/cache/zamok-cb331af6.png" data-srcset="/web/crossfit/cache/zamok-cb331af6.png 78w, /web/crossfit/cache/zamok-b90d442e.png 111w, /web/crossfit/cache/zamok-ce9396de.png 112w" data-sizes="(min-width: 78px) 78px" data-width="112" data-height="70" class="el-image" alt uk-img>        
                                    <h2 class="el-title uk-margin uk-h4 uk-text-danger">
                                       Доступ    
                                    </h2>
                                    <div class="el-content uk-margin">
                                       <p>Зарегистрируйтесь и получите доступ к личному кабинету</p>
                                    </div>
                                 </div>
                              </div>
                              <div>
                                 <div uk-scrollspy-class class="el-item uk-card uk-card-hover uk-card-body">
                                    <img data-src="/web/crossfit/cache/koshel-1774ba0c.png" data-srcset="/web/crossfit/cache/koshel-1774ba0c.png 78w, /web/crossfit/cache/koshel-4fff9b14.png 111w, /web/crossfit/cache/koshel-386149e4.png 112w" data-sizes="(min-width: 78px) 78px" data-width="112" data-height="70" class="el-image" alt uk-img>        
                                    <h2 class="el-title uk-margin uk-h4 uk-text-danger">
                                       Оплата    
                                    </h2>
                                    <div class="el-content uk-margin">
                                       <p>Выберите и оплатите удобный для вас абонемент</p>
                                    </div>
                                 </div>
                              </div>
                              <div>
                                 <div uk-scrollspy-class class="el-item uk-card uk-card-hover uk-card-body">
                                    <img data-src="/web/crossfit/cache/vibor-ddb28f00.png" data-srcset="/web/crossfit/cache/vibor-ddb28f00.png 78w, /web/crossfit/cache/vibor-be647521.png 111w, /web/crossfit/cache/vibor-c9faa7d1.png 112w" data-sizes="(min-width: 78px) 78px" data-width="112" data-height="70" class="el-image" alt uk-img>        
                                    <h2 class="el-title uk-margin uk-h4 uk-text-danger">
                                       Выбор тренировки    
                                    </h2>
                                    <div class="el-content uk-margin">
                                       <p>Получите код доступа на тренировку в личном кабинете</p>
                                    </div>
                                 </div>
                              </div>
                              <div>
                                 <div uk-scrollspy-class class="el-item uk-card uk-card-hover uk-card-body">
                                    <img data-src="/web/crossfit/cache/abonement-c5139b4f.png" data-srcset="/web/crossfit/cache/abonement-c5139b4f.png 78w, /web/crossfit/cache/abonement-677f8250.png 111w, /web/crossfit/cache/abonement-10e150a0.png 112w" data-sizes="(min-width: 78px) 78px" data-width="112" data-height="70" class="el-image" alt uk-img>        
                                    <h2 class="el-title uk-margin uk-h4 uk-text-danger">
                                       Тренируйтесь    
                                    </h2>
                                    <div class="el-content uk-margin">
                                       <p>Сообщите код доступа на ресепшене клуба</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="uk-margin uk-text-center" uk-scrollspy-class>
                              <a class="el-content uk-button uk-button-primary" href="/component/vpadvanceduser/?view=login#tab-registration">
                              <span class="uk-text-middle">Зарегистрироваться</span>
                              <span uk-icon="user"></span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="clubs" class="uk-section-muted uk-section" uk-scrollspy="{&quot;target&quot;:&quot;[uk-scrollspy-class]&quot;,&quot;cls&quot;:&quot;uk-animation-fade&quot;,&quot;delay&quot;:false}">
               <div class="uk-container">
                  <div id="#clubs" class="uk-grid-medium uk-flex-middle uk-grid-margin-medium" uk-grid>
                     <div class="uk-width-1-1@m">
                        <h2 class="uk-text-center uk-h2" uk-scrollspy-class>
                           Лучшие кроссфит клубы Санкт-Петербурга    
                        </h2>
                        <div  class="uk-divider-icon" uk-scrollspy-class></div>
                     </div>
                  </div>
                  <div class="uk-grid-margin" uk-grid>
                     <div class="uk-width-expand@m">
                        <div class="uk-margin uk-child-width-1-1 uk-grid-match uk-grid-medium uk-grid-divider" uk-grid>
                           <div>
                              <div uk-scrollspy-class="uk-animation-scale-down" class="el-item uk-card uk-card-hover uk-card-small uk-card-body">
                                 <a href="/crossfit-rekord" class="el-link uk-position-cover uk-position-z-index uk-margin-remove-adjacent"></a>
                                 <div class="uk-child-width-expand uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-3@m">
                                       <img data-src="/web/crossfit/cache/rekord-fc5e65d1.png" data-srcset="/web/crossfit/cache/rekord-fc5e65d1.png 395w" data-sizes="(min-width: 395px) 395px" data-width="395" data-height="238" class="el-image uk-border-rounded" alt uk-img>            
                                    </div>
                                    <div>
                                       <div>
                                          <h3 class="el-title uk-margin uk-h5 uk-margin-remove-adjacent uk-margin-small-bottom">
                                             CrossFit Rekord    
                                          </h3>
                                          <div class="el-meta uk-margin uk-text-meta">Санкт-Петербург, м. Парнас, ул. Михаила Дудина, 15</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div uk-scrollspy-class="uk-animation-scale-down" class="el-item uk-card uk-card-hover uk-card-small uk-card-body">
                                 <a href="/evrofitness" class="el-link uk-position-cover uk-position-z-index uk-margin-remove-adjacent"></a>
                                 <div class="uk-child-width-expand uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-3@m">
                                       <img data-src="/web/crossfit/cache/evrofitness-250362b0.png" data-srcset="/web/crossfit/cache/evrofitness-250362b0.png 395w" data-sizes="(min-width: 395px) 395px" data-width="395" data-height="238" class="el-image uk-border-rounded" alt uk-img>            
                                    </div>
                                    <div>
                                       <div>
                                          <h3 class="el-title uk-margin uk-h5 uk-margin-remove-adjacent uk-margin-small-bottom">
                                             Еврофитнес    
                                          </h3>
                                          <div class="el-meta uk-margin uk-text-meta">Санкт-Петербург, просп. Науки, 10, корп. 1</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div uk-scrollspy-class="uk-animation-scale-down" class="el-item uk-card uk-card-hover uk-card-small uk-card-body">
                                 <a href="/chernaya-belka" class="el-link uk-position-cover uk-position-z-index uk-margin-remove-adjacent"></a>
                                 <div class="uk-child-width-expand uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-3@m">
                                       <img data-src="/web/crossfit/cache/belka-95400ede.png" data-srcset="/web/crossfit/cache/belka-95400ede.png 395w" data-sizes="(min-width: 395px) 395px" data-width="395" data-height="238" class="el-image uk-border-rounded" alt uk-img>            
                                    </div>
                                    <div>
                                       <div>
                                          <h3 class="el-title uk-margin uk-h5 uk-margin-remove-adjacent uk-margin-small-bottom">
                                             Чёрная Белка    
                                          </h3>
                                          <div class="el-meta uk-margin uk-text-meta">Санкт-Петербург, Приморский пр-кт. 50, Литер Б</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="uk-width-expand@m">
                        <div class="uk-margin uk-child-width-1-1 uk-grid-match uk-grid-medium uk-grid-divider" uk-grid>
                           <div>
                              <div uk-scrollspy-class="uk-animation-scale-up" class="el-item uk-card uk-card-hover uk-card-small uk-card-body">
                                 <a href="/backstage-crossfit" class="el-link uk-position-cover uk-position-z-index uk-margin-remove-adjacent"></a>
                                 <div class="uk-child-width-expand uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-3@m">
                                       <img data-src="/web/crossfit/cache/baksteyg-5e817903.png" data-srcset="/web/crossfit/cache/baksteyg-5e817903.png 395w" data-sizes="(min-width: 395px) 395px" data-width="395" data-height="238" class="el-image uk-border-rounded" alt uk-img>            
                                    </div>
                                    <div>
                                       <div>
                                          <h3 class="el-title uk-margin uk-h5 uk-margin-remove-adjacent uk-margin-small-bottom">
                                             Backstage Crossfit    
                                          </h3>
                                          <div class="el-meta uk-margin uk-text-meta">Санкт-Петербург, Инструментальная ул. 3г</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div uk-scrollspy-class="uk-animation-scale-up" class="el-item uk-card uk-card-hover uk-card-small uk-card-body">
                                 <a href="/red-tower-crossfit" class="el-link uk-position-cover uk-position-z-index uk-margin-remove-adjacent"></a>
                                 <div class="uk-child-width-expand uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-3@m">
                                       <img data-src="/web/crossfit/cache/redtower-1bcf1753.png" data-srcset="/web/crossfit/cache/redtower-1bcf1753.png 395w" data-sizes="(min-width: 395px) 395px" data-width="395" data-height="238" class="el-image uk-border-rounded" alt uk-img>            
                                    </div>
                                    <div>
                                       <div>
                                          <h3 class="el-title uk-margin uk-h5 uk-margin-remove-adjacent uk-margin-small-bottom">
                                             Red Tower CrossFit    
                                          </h3>
                                          <div class="el-meta uk-margin uk-text-meta">Санкт-Петербург, ул. Газовая, 10ж., 4 этаж - купол</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div uk-scrollspy-class="uk-animation-scale-up" class="el-item uk-card uk-card-hover uk-card-small uk-card-body">
                                 <a href="/sever-crosffit" class="el-link uk-position-cover uk-position-z-index uk-margin-remove-adjacent"></a>
                                 <div class="uk-child-width-expand uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-3@m">
                                       <img data-src="/web/crossfit/cache/severcrossfit-90460e08.png" data-srcset="/web/crossfit/cache/severcrossfit-90460e08.png 395w" data-sizes="(min-width: 395px) 395px" data-width="395" data-height="238" class="el-image uk-border-rounded" alt uk-img>            
                                    </div>
                                    <div>
                                       <div>
                                          <h3 class="el-title uk-margin uk-h5 uk-margin-remove-adjacent uk-margin-small-bottom">
                                             Sever Crossfit    
                                          </h3>
                                          <div class="el-meta uk-margin uk-text-meta">Санкт-Петербург, Московский пр., д.65, м.Фрунзенская, ст. Балтийская</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="uk-width-expand@m">
                        <div class="uk-margin uk-child-width-1-1 uk-grid-match uk-grid-medium uk-grid-divider" uk-grid>
                           <div>
                              <div uk-scrollspy-class="uk-animation-scale-up" class="el-item uk-card uk-card-hover uk-card-small uk-card-body">
                                 <a href="/neva-crossfit" class="el-link uk-position-cover uk-position-z-index uk-margin-remove-adjacent"></a>
                                 <div class="uk-child-width-expand uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-3@m">
                                       <img data-src="/web/crossfit/cache/nevacrossfit-627ef47d.png" data-srcset="/web/crossfit/cache/nevacrossfit-627ef47d.png 395w" data-sizes="(min-width: 395px) 395px" data-width="395" data-height="238" class="el-image uk-border-rounded" alt uk-img>            
                                    </div>
                                    <div>
                                       <div>
                                          <h3 class="el-title uk-margin uk-h5 uk-margin-remove-adjacent uk-margin-small-bottom">
                                             Neva Crossfit    
                                          </h3>
                                          <div class="el-meta uk-margin uk-text-meta">Санкт-Петербург, Измайловский 22, к. 3</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div uk-scrollspy-class="uk-animation-scale-up" class="el-item uk-card uk-card-hover uk-card-small uk-card-body">
                                 <a href="/terraleon" class="el-link uk-position-cover uk-position-z-index uk-margin-remove-adjacent"></a>
                                 <div class="uk-child-width-expand uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-3@m">
                                       <img data-src="/web/crossfit/cache/terraleon-8631df39.png" data-srcset="/web/crossfit/cache/terraleon-8631df39.png 395w" data-sizes="(min-width: 395px) 395px" data-width="395" data-height="238" class="el-image uk-border-rounded" alt uk-img>            
                                    </div>
                                    <div>
                                       <div>
                                          <h3 class="el-title uk-margin uk-h5 uk-margin-remove-adjacent uk-margin-small-bottom">
                                             Terraleon    
                                          </h3>
                                          <div class="el-meta uk-margin uk-text-meta">Санкт-Петербург, пр-кт. Металлистов, дом 7</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div uk-scrollspy-class="uk-animation-scale-up" class="el-item uk-card uk-card-hover uk-card-small uk-card-body">
                                 <a href="/udarnik-crossfit" class="el-link uk-position-cover uk-position-z-index uk-margin-remove-adjacent"></a>
                                 <div class="uk-child-width-expand uk-grid-medium uk-flex-middle" uk-grid>
                                    <div class="uk-width-1-3@m">
                                       <img data-src="/web/crossfit/cache/crossfitudarnik-1ee77153.png" data-srcset="/web/crossfit/cache/crossfitudarnik-1ee77153.png 395w" data-sizes="(min-width: 395px) 395px" data-width="395" data-height="238" class="el-image uk-border-rounded" alt uk-img>            
                                    </div>
                                    <div>
                                       <div>
                                          <h3 class="el-title uk-margin uk-h5 uk-margin-remove-adjacent uk-margin-small-bottom">
                                             Udarnik Crossfit    
                                          </h3>
                                          <div class="el-meta uk-margin uk-text-meta">Санкт-Петербург, Ворошилова 2, БЦ "Охта"</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="uk-grid-margin" uk-grid>
                     <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-text-center" uk-scrollspy-class>
                           <a class="el-content uk-button uk-button-primary" href="/clubs">
                           <span class="uk-text-middle">Все клубы</span>
                           <span uk-icon="arrow-right"></span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="maps" class="uk-section-default uk-section uk-padding-remove-vertical">
               <div class="uk-grid-margin" uk-grid>
                  <div class="uk-width-1-1@m">
                     <div class="uk-margin-remove-vertical uk-position-relative uk-position-z-index" style="height:800px" data-map="{&quot;show_title&quot;:false,&quot;type&quot;:&quot;roadmap&quot;,&quot;zoom&quot;:&quot;10&quot;,&quot;controls&quot;:true,&quot;zooming&quot;:false,&quot;dragging&quot;:false,&quot;height&quot;:&quot;800&quot;,&quot;popup_max_width&quot;:&quot;&quot;,&quot;margin&quot;:&quot;remove-vertical&quot;,&quot;attrs&quot;:[],&quot;class&quot;:[&quot;uk-margin-remove-vertical&quot;],&quot;center&quot;:{&quot;lat&quot;:60.0657,&quot;lng&quot;:30.344899999999999},&quot;markers&quot;:[{&quot;title&quot;:&quot;CrossFit Rekord&quot;,&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;crossfit-rekord\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/rekord.png\&quot; alt=\&quot;\&quot; width=\&quot;128\&quot; height=\&quot;77\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt;\u00a0\u043c\u0435\u0442\u0440\u043e \u041f\u0430\u0440\u043d\u0430\u0441, \u0443\u043b. \u041c\u0438\u0445\u0430\u0438\u043b\u0430 \u0414\u0443\u0434\u0438\u043d\u0430, 15&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt;\u00a0&lt;em&gt;crossfitrekord.ru&lt;\/em&gt;&lt;\/p&gt;&quot;,&quot;show_popup&quot;:false,&quot;lat&quot;:60.0657,&quot;lng&quot;:30.344899999999999},{&quot;title&quot;:&quot;\u0427\u0435\u0440\u043d\u0430\u044f \u0431\u0435\u043b\u043a\u0430&quot;,&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;chernaya-belka\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/belka.png\&quot; width=\&quot;121\&quot; height=\&quot;73\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt; \u0421\u0430\u043d\u043a\u0442-\u041f\u0435\u0442\u0435\u0440\u0431\u0443\u0440\u0433, \u041f\u0440\u0438\u043c\u043e\u0440\u0441\u043a\u0438\u0439 \u043f\u0440\u043e\u0441\u043f\u0435\u043a\u0442 50, \u043b\u0438\u0442\u0435\u0440 \u0411&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt;\u00a0&lt;span style=\&quot;color: #3366ff;\&quot;&gt;cfbelka.com&lt;\/span&gt;&lt;\/p&gt;&quot;,&quot;show_popup&quot;:false,&quot;lat&quot;:59.981900000000003,&quot;lng&quot;:30.271000000000001},{&quot;title&quot;:&quot;\u0415\u0432\u0440\u043e\u0444\u0438\u0442\u043d\u0435\u0441&quot;,&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;evrofitness\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/evrofitness.png\&quot; width=\&quot;114\&quot; height=\&quot;69\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt; \u0421\u0430\u043d\u043a\u0442-\u041f\u0435\u0442\u0435\u0440\u0431\u0443\u0440\u0433, \u043f\u0440-\u0442. \u041d\u0430\u0443\u043a\u0438, \u0434. 10&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt;\u00a0&lt;span style=\&quot;color: #3366ff;\&quot;&gt;eurofitclub.ru&lt;\/span&gt;&lt;\/p&gt;&quot;,&quot;lat&quot;:60.016599999999997,&quot;lng&quot;:30.370899999999999},{&quot;title&quot;:&quot;RamaCrossfit&quot;,&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;ramacrossfit\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/ramacrossfit.png\&quot; width=\&quot;144\&quot; height=\&quot;87\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt;\u00a0\u0421\u0430\u043d\u043a\u0442-\u041f\u0435\u0442\u0435\u0440\u0431\u0443\u0440\u0433, \u0422\u0440\u0430\u043c\u0432\u0430\u0439\u043d\u044b\u0439 \u043f\u0440\u043e\u0441\u043f\u0435\u043a\u0442\u00a06&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt; ramacrossfit.org&lt;\/p&gt;&quot;,&quot;show_popup&quot;:false,&quot;lat&quot;:59.858800000000002,&quot;lng&quot;:30.253499999999999},{&quot;title&quot;:&quot;\u041a\u043b\u0443\u0431 \u041c\u0438 - 8&quot;,&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;mi-8\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/mi8.png\&quot; width=\&quot;127\&quot; height=\&quot;77\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt; \u0421\u0430\u043d\u043a\u0442-\u041f\u0435\u0442\u0435\u0440\u0431\u0443\u0440\u0433, \u043c. \u041f\u0435\u0442\u0440\u043e\u0433\u0440\u0430\u0434\u0441\u043a\u0430\u044f, \u0443\u043b. \u0420\u0435\u043d\u0442\u0433\u0435\u043d\u0430 10 \u0410&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt;\u00a0&lt;span style=\&quot;color: #3366ff;\&quot;&gt;&lt;em&gt;crossfit-spb.ru&lt;\/em&gt;&lt;\/span&gt;&lt;\/p&gt;&quot;,&quot;lat&quot;:59.9636,&quot;lng&quot;:30.319199999999999},{&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;101\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/101.png\&quot; width=\&quot;149\&quot; height=\&quot;90\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt; \u041b\u0435\u043d\u0438\u043d\u0433\u0440\u0430\u0434\u0441\u043a\u0430\u044f \u043e\u0431\u043b., \u0433. \u0412\u0441\u0435\u0432\u043e\u043b\u043e\u0436\u0441\u043a, \u0443\u043b. \u0421\u043e\u0446\u0438\u0430\u043b\u0438\u0441\u0442\u0438\u0447\u0435\u0441\u043a\u0430\u044f, 101&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt;\u00a0&lt;span style=\&quot;color: #3366ff;\&quot;&gt;&lt;em&gt;sportclub101.ru&lt;\/em&gt;&lt;\/span&gt;&lt;\/p&gt;&quot;,&quot;title&quot;:&quot;\u0421\u043f\u043e\u0440\u0442 \u043a\u043b\u0443\u0431 101&quot;,&quot;lat&quot;:60.017400000000002,&quot;lng&quot;:30.640000000000001},{&quot;title&quot;:&quot;\u041f\u043b\u044e\u0448\u0435\u0432\u0430\u044f \u0431\u043e\u0440\u043e\u0434\u0430&quot;,&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;boroda\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/boroda.png\&quot; width=\&quot;136\&quot; height=\&quot;82\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt;\u00a0\u0421\u0430\u043d\u043a\u0442-\u041f\u0435\u0442\u0435\u0440\u0431\u0443\u0440\u0433,\u00a0 \u0443\u043b\u0438\u0446\u0430 \u0420\u043e\u0437\u0435\u043d\u0448\u0442\u0435\u0439\u043d\u0430, 17&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt;\u00a0&lt;em&gt;vk.com\/boroda_training&lt;\/em&gt;&lt;\/p&gt;&quot;,&quot;lat&quot;:59.906500000000001,&quot;lng&quot;:30.290800000000001},{&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;red-tower-crossfit\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/redtower.png\&quot; width=\&quot;113\&quot; height=\&quot;68\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt; \u0421\u0430\u043d\u043a\u0442-\u041f\u0435\u0442\u0435\u0440\u0431\u0443\u0440\u0433, \u0443\u043b. \u0413\u0430\u0437\u043e\u0432\u0430\u044f, 10\u0436.&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt;\u00a0&lt;span style=\&quot;color: #3366ff;\&quot;&gt;redtower.ru&lt;\/span&gt;&lt;\/p&gt;&quot;,&quot;title&quot;:&quot;Redtower&quot;,&quot;lat&quot;:59.964599999999997,&quot;lng&quot;:30.2943},{&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;black-tower-crossfit\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/blacktower.png\&quot; width=\&quot;120\&quot; height=\&quot;73\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt;\u00a0\u0421\u0430\u043d\u043a\u0442-\u041f\u0435\u0442\u0435\u0440\u0431\u0443\u0440\u0433, \u0411\u0443\u0445\u0430\u0440\u0435\u0441\u0442\u0441\u043a\u0430\u044f \u0443\u043b\u0438\u0446\u0430, 6&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt;\u00a0&lt;span style=\&quot;color: #3366ff;\&quot;&gt;&lt;em&gt;blacktower.pro&lt;\/em&gt;&lt;\/span&gt;&lt;\/p&gt;&quot;,&quot;title&quot;:&quot;Blacktower&quot;,&quot;lat&quot;:59.896599999999999,&quot;lng&quot;:30.355899999999998},{&quot;content&quot;:&quot;&lt;p&gt;&lt;a href=\&quot;sever-crosffit\&quot;&gt;&lt;img style=\&quot;display: block; margin-left: auto; margin-right: auto;\&quot; src=\&quot;images\/severcrossfit.png\&quot; width=\&quot;131\&quot; height=\&quot;79\&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\n&lt;p&gt;&lt;strong&gt;\u0410\u0434\u0440\u0435\u0441:&lt;\/strong&gt; \u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439 \u043f\u0440., \u0434.65, \u043c. \u0424\u0440\u0443\u043d\u0437\u0435\u043d\u0441\u043a\u0430\u044f, \u0411\u0430\u043b\u0442\u0438\u0439\u0441\u043a\u0430\u044f&lt;br \/&gt;&lt;strong&gt;\u0421\u0430\u0439\u0442 \u043a\u043b\u0443\u0431\u0430:&lt;\/strong&gt;\u00a0&lt;span style=\&quot;color: #3366ff;\&quot;&gt;&lt;em&gt;severcrossfit.ru&lt;\/em&gt;&lt;\/span&gt;&lt;\/p&gt;&quot;,&quot;title&quot;:&quot;Severcrossfit&quot;,&quot;lat&quot;:59.895200000000003,&quot;lng&quot;:30.319099999999999}]}"></div>
                  </div>
               </div>
            </div>
            <div class="uk-section-default uk-section-overlap uk-position-relative" uk-scrollspy="{&quot;target&quot;:&quot;[uk-scrollspy-class]&quot;,&quot;cls&quot;:&quot;uk-animation-slide-bottom&quot;,&quot;delay&quot;:false}">
               <div data-src="/web/crossfit/cache/home-background2-9480fdb7.jpeg" data-srcset="/web/crossfit/cache/home-background2-9407b507.jpeg 768w, /web/crossfit/cache/home-background2-ef7d908d.jpeg 1024w, /web/crossfit/cache/home-background2-be2f45a7.jpeg 1366w, /web/crossfit/cache/home-background2-e1966ff3.jpeg 1600w, /web/crossfit/cache/home-background2-9480fdb7.jpeg 1920w" data-sizes="(min-width: 1920px) 1920px" uk-img class="uk-background-norepeat uk-background-cover uk-background-center-center uk-section uk-section-xlarge">
                  <div class="uk-position-cover" style="background-color: rgba(255, 255, 255, 0.79);"></div>
                  <div class="uk-container uk-position-relative">
                     <div class="uk-grid-large uk-margin-xlarge" uk-grid>
                        <div class="uk-width-1-1@m">
                           <h2 class="uk-text-center" uk-scrollspy-class>
                              Остались вопросы?    
                           </h2>
                           <div class="uk-margin-medium uk-width-xlarge uk-margin-auto uk-text-center" uk-scrollspy-class>
                           </div>
                           <div>
                              <div style="text-align: center;"><a href="#test" data-rstbox="1" class="el-content uk-button uk-button-primary" title="Задать вопрос"><span class="uk-text-middle">Задать вопрос</span><span uk-icon="mail" class="uk-icon"></span></a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a style="position: fixed!important" class="uk-position-medium uk-position-bottom-right uk-button uk-button-primary" href="/?task=article.edit&amp;a_id=1&amp;return=aHR0cHM6Ly92c2V2Y3Jvc3NmaXQucnUv">Edit</a>
            <div class="tm-footer uk-section-secondary uk-section" uk-scrollspy="{&quot;target&quot;:&quot;[uk-scrollspy-class]&quot;,&quot;cls&quot;:&quot;uk-animation-slide-bottom-medium&quot;,&quot;delay&quot;:200}">
               <div class="uk-container">
                  <div class="uk-flex-middle uk-margin-remove-vertical" uk-grid>
                     <div class="uk-width-1-1@m">
                        <div class="uk-margin-remove-vertical uk-text-center">
                           <a href="#" uk-totop uk-scroll uk-scrollspy-class></a>
                        </div>
                     </div>
                  </div>
                  <div class="uk-flex-middle uk-grid-margin" uk-grid>
                     <div class="uk-width-expand@m">
                        <div class="uk-margin uk-text-left@m uk-text-center" uk-scrollspy-class>
                           <a href="/" class="el-link"><img data-src="/web/crossfit/cache/logo-w-f4bc6480.png" data-srcset="/web/crossfit/cache/logo-w-f4bc6480.png 202w, /web/crossfit/cache/logo-w-8b67c87c.png 260w" data-sizes="(min-width: 202px) 202px" data-width="260" data-height="58" class="el-image" alt uk-img></a>    
                        </div>
                     </div>
                     <div class="uk-width-expand@m">
                        <div class="uk-margin uk-text-center uk-text-meta" uk-scrollspy-class>
                           2017 год. Все права защищены
                        </div>
                     </div>
                     <div class="uk-width-expand@m">
                        <div>
                           <div style="text-align: center;">
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  <?php  include Yii::$app->basePath.'/modules/cabinet/views/layouts/_forms.php'; ?>
   </body>
</html>

