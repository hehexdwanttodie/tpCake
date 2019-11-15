<?php
$urlToPhonesAutocompleteJson = $this->Url->build([
    "controller" => "Phones",
    "action" => "findPhones",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToPhonesAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Phones/autocomplete', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('Phones') ?>
<fieldset>
    <legend><?= __('Search Phone') ?></legend>
    <?php
    echo $this->Form->input('name', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>
