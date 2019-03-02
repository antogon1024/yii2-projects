<?php $this->beginPage() ?>
<?php $this->beginBody() ?>
<?= $content ?>
<?php  include __DIR__ . '/_forms.php'; ?>
<?php $this->endBody() ?>
<?php $this->endPage() ?>