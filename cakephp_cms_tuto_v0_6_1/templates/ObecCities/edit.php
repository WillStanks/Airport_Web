<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObecCity $obecCity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $obecCity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $obecCity->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Obec Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="obecCities form content">
            <?= $this->Form->create($obecCity) ?>
            <fieldset>
                <legend><?= __('Edit Obec City') ?></legend>
                <?php
                    echo $this->Form->control('kraj_region_id', ['options' => $krajRegions]);
                    echo $this->Form->control('okres_county_id', ['options' => $okresCounties]);
                    echo $this->Form->control('kod');
                    echo $this->Form->control('nazev');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
