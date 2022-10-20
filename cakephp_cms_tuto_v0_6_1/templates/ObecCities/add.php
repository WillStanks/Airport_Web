<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObecCity $obecCity
 */
?>
<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "OkresCounties",
    "action" => "getByKrajRegion",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('ObecCities/add_edit', ['block' => 'scriptBottom']);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Obec Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="obecCities form content">
            <?= $this->Form->create($obecCity) ?>
            <fieldset>
                <legend><?= __('Add Obec City') ?></legend>
                <?php
                    echo $this->Form->control('kraj_region_id', ['options' => $krajRegions]);
                    echo $this->Form->control('okres_county_id', ['options' => [__('Please select a KrajRegion first')]]);
                    echo $this->Form->control('kod');
                    echo $this->Form->control('nazev');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
