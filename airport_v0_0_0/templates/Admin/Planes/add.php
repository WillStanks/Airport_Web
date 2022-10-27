<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plane $plane
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservations
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Planes'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="planes form content">
    <?= $this->Form->create($plane) ?>
    <fieldset>
        <legend><?= __('Add Plane') ?></legend>
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
