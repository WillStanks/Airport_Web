<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OkresCounty $okresCounty
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $okresCounty->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $okresCounty->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Okres Counties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="okresCounties form content">
            <?= $this->Form->create($okresCounty) ?>
            <fieldset>
                <legend><?= __('Edit Okres County') ?></legend>
                <?php
                    echo $this->Form->control('kraj_region_id', ['options' => $krajRegions]);
                    echo $this->Form->control('kod');
                    echo $this->Form->control('nazev');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
