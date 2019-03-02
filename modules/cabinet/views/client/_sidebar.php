<div class="antm-menu-header">
    <p id="antm-p-1" class="">Vsevcrossfit</p>

    <p id="antm-p-2" class="ant-p-bell">
        <img src="/web/images/mod_cabinet/clients/<?= $data['user']['photo'] ?>" width="100">
        <span id="ant-span-bell" class="uk-icon-bell-o"></span>
    </p>

    <p id="antm-p-5"><?= $data['user']['full_name'] ?></p>

    <p id="antm-p-6">id: <?= $data['user']['user_id'] ?></p>
</div>

<ul id="ant-ul">
    <li>
        <span class="uk-icon-check ant-silver uk-icon-small"></span>
        <a href="/cabinet/my-tariff" class="ant-red">Мой тариф</a>
    </li>
    <li>
        <span class="uk-icon-angellist ant-silver uk-icon-small"></span>
        <a href="/cabinet/my-clubs">Мои клубы</a>
    </li>
    <li>
        <span class="uk-icon-user ant-silver uk-icon-small"></span>
        <a href="/cabinet/personal-data">Личные данные</a>
    </li>
    <li>
        <span class="uk-icon-lock ant-silver uk-icon-small"></span>
        <a href="/cabinet/access-code">Код доступа</a>
    </li>
    <li>
        <span class="uk-icon-question-circle ant-silver uk-icon-small"></span>
        <a href="/cabinet/questions">Вопросы и ответы</a>
    </li>
    <li id="ant-version">Версия кабинета 1.0</li>
</ul>

