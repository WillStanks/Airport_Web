<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProvincesState[]|\Cake\Collection\CollectionInterface $provincesStates
 */
?>
<div class="provincesStates index content">
    <?= $this->Html->link(__('New Provinces State'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Provinces States') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('country_id') ?></th>
                    <th><?= $this->Paginator->sort('province_states') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($provincesStates as $provincesState): ?>
                <tr>
                    <td><?= $this->Number->format($provincesState->id) ?></td>
                    <td><?= $provincesState->has('country') ? $this->Html->link($provincesState->country->id, ['controller' => 'Countries', 'action' => 'view', $provincesState->country->id]) : '' ?></td>
                    <td><?= h($provincesState->province_states) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $provincesState->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $provincesState->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $provincesState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provincesState->id)]) ?>
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
