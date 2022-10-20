<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OkresCounty[]|\Cake\Collection\CollectionInterface $okresCounties
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Quit Admin View'), ['prefix' => false,'controller' => 'OkresCounties','action' => 'index'], ['class' => 'btn btn-danger']) ?></li>
<li><?= $this->Html->link(__('New Okres County'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Kraj Regions'), ['controller' => 'KrajRegions', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Kraj Region'), ['controller' => 'KrajRegions', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Obec Cities'), ['controller' => 'ObecCities', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Obec City'), ['controller' => 'ObecCities', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('kraj_region_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('kod') ?></th>
        <th scope="col"><?= $this->Paginator->sort('nazev') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($okresCounties as $okresCounty) : ?>
        <tr>
            <td><?= $this->Number->format($okresCounty->id) ?></td>
            <td><?= $okresCounty->has('kraj_region') ? $this->Html->link($okresCounty->kraj_region->nazev, ['controller' => 'KrajRegions', 'action' => 'view', $okresCounty->kraj_region->id]) : '' ?></td>
            <td><?= h($okresCounty->kod) ?></td>
            <td><?= h($okresCounty->nazev) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $okresCounty->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $okresCounty->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $okresCounty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $okresCounty->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('First')) ?>
        <?= $this->Paginator->prev('< ' . __('Previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('Next') . ' >') ?>
        <?= $this->Paginator->last(__('Last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>
