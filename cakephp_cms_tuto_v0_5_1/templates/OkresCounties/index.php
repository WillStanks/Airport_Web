<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OkresCounty[]|\Cake\Collection\CollectionInterface $okresCounties
 */
?>
<div class="okresCounties index content">
    <?= $this->Html->link(__('New Okres County'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Okres Counties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('kraj_region_id') ?></th>
                    <th><?= $this->Paginator->sort('kod') ?></th>
                    <th><?= $this->Paginator->sort('nazev') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($okresCounties as $okresCounty): ?>
                <tr>
                    <td><?= $this->Number->format($okresCounty->id) ?></td>
                    <td><?= $okresCounty->has('kraj_region') ? $this->Html->link($okresCounty->kraj_region->id, ['controller' => 'KrajRegions', 'action' => 'view', $okresCounty->kraj_region->id]) : '' ?></td>
                    <td><?= h($okresCounty->kod) ?></td>
                    <td><?= h($okresCounty->nazev) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $okresCounty->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $okresCounty->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $okresCounty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $okresCounty->id)]) ?>
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
