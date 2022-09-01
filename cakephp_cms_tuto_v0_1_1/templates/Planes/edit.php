<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plane $plane
 * @var string[]|\Cake\Collection\CollectionInterface $reservations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $plane->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $plane->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Planes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="planes form content">
            <?= $this->Form->create($plane) ?>
            <fieldset>
                <legend><?= __('Edit Plane') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('seats');
                    echo $this->Form->control('details');
                    echo $this->Form->control('reservations._ids', ['options' => $reservations]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
