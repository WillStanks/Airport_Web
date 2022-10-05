<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 * @var \Cake\Collection\CollectionInterface|string[] $provincesStates
 */
?>
<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "ProvincesStates",
    "action" => "getByCountry",
    "_ext" => "json"
]);

echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Cities/add_edit', ['block' => 'scriptBottom']);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cities form content">
            <?= $this->Form->create($city) ?>
            <fieldset>
                <legend><?= __('Add City') ?></legend>
                <?php
                echo $this->Form->control('country_id', ['options', $countries]);
                echo $this->Form->control('province_id', ['options' => [__('Please select a Country first')]]);
                echo $this->Form->control('city');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>