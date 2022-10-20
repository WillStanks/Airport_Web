<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObecCity[]|\Cake\Collection\CollectionInterface $obecCities
 */
?>
<div class="obecCities index content">
    <?= $this->Html->link(__('New Obec City'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Obec Cities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('kraj_region_id') ?></th>
                    <th><?= $this->Paginator->sort('okres_county_id') ?></th>
                    <th><?= $this->Paginator->sort('kod') ?></th>
                    <th><?= $this->Paginator->sort('nazev') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($obecCities as $obecCity): ?>
                <tr>
                    <td><?= $this->Number->format($obecCity->id) ?></td>
                    <td><?= $obecCity->has('kraj_region') ? $this->Html->link($obecCity->kraj_region->id, ['controller' => 'KrajRegions', 'action' => 'view', $obecCity->kraj_region->id]) : '' ?></td>
                    <td><?= $obecCity->has('okres_county') ? $this->Html->link($obecCity->okres_county->id, ['controller' => 'OkresCounties', 'action' => 'view', $obecCity->okres_county->id]) : '' ?></td>
                    <td><?= h($obecCity->kod) ?></td>
                    <td><?= h($obecCity->nazev) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $obecCity->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $obecCity->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $obecCity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $obecCity->id)]) ?>
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
