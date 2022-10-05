<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New City'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cities view content">
            <h3><?= h($city->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Provinces State') ?></th>
                    <td><?= $city->has('provinces_state') ? $this->Html->link($city->provinces_state->id, ['controller' => 'ProvincesStates', 'action' => 'view', $city->provinces_state->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($city->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($city->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
