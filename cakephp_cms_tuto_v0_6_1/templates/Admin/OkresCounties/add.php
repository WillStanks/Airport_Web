<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OkresCounty $okresCounty
 * @var \App\Model\Entity\KrajRegion[]|\Cake\Collection\CollectionInterface $krajRegions
 * @var \App\Model\Entity\ObecCity[]|\Cake\Collection\CollectionInterface $obecCities
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Okres Counties'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Kraj Regions'), ['controller' => 'KrajRegions', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Kraj Region'), ['controller' => 'KrajRegions', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Obec Cities'), ['controller' => 'ObecCities', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Obec City'), ['controller' => 'ObecCities', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="okresCounties form content">
    <?= $this->Form->create($okresCounty) ?>
    <fieldset>
        <legend><?= __('Add Okres County') ?></legend>
        <?php
            echo $this->Form->control('kraj_region_id', ['options' => $krajRegions]);
            echo $this->Form->control('kod');
            echo $this->Form->control('nazev');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
