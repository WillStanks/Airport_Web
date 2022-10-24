<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservations
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('depCity_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('destCity_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
            <th scope="col"><?= $this->Paginator->sort('image') ?></th>
            <th scope="col"><?= $this->Paginator->sort('escale') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation) : ?>
            <tr>
                <td><?= $this->Number->format($reservation->id) ?></td>
                <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
                <td><?= h($reservation->title) ?></td>
                <td><?= $reservation->has('dep_city') ? $this->Html->link($reservation->dep_city->city, ['controller' => 'Cities', 'action' => 'view', $reservation->dep_city->id]) : '' ?></td>
                <td><?= $reservation->has('dest_city') ? $this->Html->link($reservation->dest_city->city, ['controller' => 'Cities', 'action' => 'view', $reservation->dest_city->id]) : '' ?></td>
                <td><?= h($reservation->slug) ?></td>
                <td><?= h($reservation->image) ?></td>
                <td><?= h($reservation->escale) ?></td>
                <td><?= h($reservation->created) ?></td>
                <td><?= h($reservation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
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