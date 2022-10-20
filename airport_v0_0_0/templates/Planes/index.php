<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plane[]|\Cake\Collection\CollectionInterface $planes
 */
?>
<div class="planes index content">
    <?= $this->Html->link(__('Admin Planes'), ['controller' => 'Planes', 'prefix' => 'Admin'], ['class' => 'button float-right']) ?>
    <h3><?= __('Planes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('seats') ?></th>
                    <th><?= $this->Paginator->sort('details') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
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
                            <?= $this->Html->link(__('View'), ['action' => 'view', $plane->id]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>