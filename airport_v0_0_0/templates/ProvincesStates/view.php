<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProvincesState $provincesState
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Provinces State'), ['action' => 'edit', $provincesState->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Provinces State'), ['action' => 'delete', $provincesState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provincesState->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Provinces States'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Provinces State'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provincesStates view content">
            <h3><?= h($provincesState->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= $provincesState->has('country') ? $this->Html->link($provincesState->country->id, ['controller' => 'Countries', 'action' => 'view', $provincesState->country->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Province States') ?></th>
                    <td><?= h($provincesState->province_states) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($provincesState->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
