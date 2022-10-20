<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plane $plane
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Planes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="planes view content">
            <h3><?= h($plane->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($plane->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Details') ?></th>
                    <td><?= h($plane->details) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($plane->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seats') ?></th>
                    <td><?= $this->Number->format($plane->seats) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($plane->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($plane->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Reservations') ?></h4>
                <?php if (!empty($plane->reservations)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Title') ?></th>
                                <th><?= __('DepCity') ?></th>
                                <th><?= __('DestCity') ?></th>
                                <th><?= __('Slug') ?></th>
                                <th><?= __('Body') ?></th>
                                <th><?= __('Escale') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($plane->reservations as $reservations) : ?>
                                <tr>
                                    <td><?= h($reservations->id) ?></td>
                                    <td><?= h($reservations->user_id) ?></td>
                                    <td><?= h($reservations->title) ?></td>
                                    <td><?= h($reservations->depCity) ?></td>
                                    <td><?= h($reservations->destCity) ?></td>
                                    <td><?= h($reservations->slug) ?></td>
                                    <td><?= h($reservations->body) ?></td>
                                    <td><?= h($reservations->escale) ?></td>
                                    <td><?= h($reservations->created) ?></td>
                                    <td><?= h($reservations->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
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