<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KrajRegion $krajRegion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $krajRegion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $krajRegion->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Kraj Regions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="krajRegions form content">
            <?= $this->Form->create($krajRegion) ?>
            <fieldset>
                <legend><?= __('Edit Kraj Region') ?></legend>
                <?php
                    echo $this->Form->control('kod');
                    echo $this->Form->control('nazev');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
