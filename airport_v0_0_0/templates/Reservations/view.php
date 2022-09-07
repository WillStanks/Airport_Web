<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->slug], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reservations view content">
            <h3><?= h($reservation->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($reservation->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('DepCity') ?></th>
                    <td><?= h($reservation->depCity) ?></td>
                </tr>
                <tr>
                    <th><?= __('DestCity') ?></th>
                    <td><?= h($reservation->destCity) ?></td>
                </tr>
                <!--tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($reservation->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reservation->id) ?></td>
                </tr-->
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($reservation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($reservation->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Published') ?></th>
                    <td><?= $reservation->published ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Body') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($reservation->body)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Planes') ?></h4>
                <?php if (!empty($reservation->planes)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Title') ?></th>
                                <th><?= __('Seats') ?></th>
                                <th><?= __('Details') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($reservation->planes as $planes) : ?>
                                <tr>
                                    <td><?= h($planes->id) ?></td>
                                    <td><?= h($planes->title) ?></td>
                                    <td><?= h($planes->seats) ?></td>
                                    <td><?= h($planes->details) ?></td>
                                    <td><?= h($planes->created) ?></td>
                                    <td><?= h($planes->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Planes', 'action' => 'view', $planes->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Planes', 'action' => 'edit', $planes->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Planes', 'action' => 'delete', $planes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planes->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>