<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plane[]|\Cake\Collection\CollectionInterface $planes
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Plane'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('seats') ?></th>
            <th scope="col"><?= $this->Paginator->sort('details') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($planes as $plane) : ?>
            <tr>
                <td><?= $this->Number->format($plane->id) ?></td>
                <td><?= h($plane->title) ?></td>
                <td><?= $this->Number->format($plane->seats) ?></td>
                <td><?= h($plane->details) ?></td>
                <td><?= h($plane->created) ?></td>
                <td><?= h($plane->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $plane->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $plane->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $plane->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plane->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('«', ['label' => __('First')]) ?>
        <?= $this->Paginator->prev('‹', ['label' => __('Previous')]) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('›', ['label' => __('Next')]) ?>
        <?= $this->Paginator->last('»', ['label' => __('Last')]) ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>