<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KrajRegion[]|\Cake\Collection\CollectionInterface $krajRegions
 */
?>
<div class="krajRegions index content">
    <?= $this->Html->link(__('New Kraj Region'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Kraj Regions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('kod') ?></th>
                    <th><?= $this->Paginator->sort('nazev') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($krajRegions as $krajRegion): ?>
                <tr>
                    <td><?= $this->Number->format($krajRegion->id) ?></td>
                    <td><?= h($krajRegion->kod) ?></td>
                    <td><?= h($krajRegion->nazev) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $krajRegion->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $krajRegion->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $krajRegion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $krajRegion->id)]) ?>
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
