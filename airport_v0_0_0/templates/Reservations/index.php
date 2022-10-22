<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservations
 */
?>
<div class="reservations index content">
    <?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reservations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('depCity') ?></th>
                    <th><?= $this->Paginator->sort('destCity') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation) : ?>
                    <tr>
                        <td><?= h($reservation->title) ?></td>
                        <td><?= h($reservation->dep_city->city) ?></td>
                        <td><?= h($reservation->dest_city->city) ?></td>
                        <td><?= @$this->Html->image('reservations/' . $reservation->image, ['style' => 'max_width:50px;height:50px;border-radius:50%;']) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->slug]) ?>
                            <?= $this->Html->link('(pdf)', ['action' => 'view', $reservation->slug . '.pdf']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->slug]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>