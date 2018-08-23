<form id="ant-test" name="form" action="/cabinet/test" method="post" enctype="multipart/form-data">
    <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />

    <div class="ant-block-1">
        <a class="uk-form-file" style="text-decoration:none;">
            <div class="uk-text-small uk-text-bold ant-color-4 ant-title-field">
                <span class="ant-title">Аватар клуба</span>
                <span class="ant-required" style="display: inline;"></span>
            </div>
            <input id="upload-select-1" type="file" name="Test[logo]">
        </a>
        <div>
            <input name="RegisterClub[icon]" id="ant-avatar-2" class="ant-input-1" type="text" style="cursor:text;" readonly="">

            <div class="ant-errors error-icon"><?=$errors['logo']?></div>
            <div class="ant-errors error-logo"></div>
        </div>
    </div>


    <button id="ant-test-but" type="submit" class="ant-btn ant-btn-primary ant-btn-lg 2ant-button-3">Сохранить</button>
</form>