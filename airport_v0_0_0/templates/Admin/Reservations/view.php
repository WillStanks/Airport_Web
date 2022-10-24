<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="reservations view large-9 medium-8 columns content">
    <h3><?= h($reservation->title) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Title') ?></th>
                <td><?= h($reservation->title) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Dep City') ?></th>
                <td><?= $reservation->has('dep_city') ? $this->Html->link($reservation->dep_city->city, ['controller' => 'Cities', 'action' => 'view', $reservation->dep_city->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Dest City') ?></th>
                <td><?= $reservation->has('dest_city') ? $this->Html->link($reservation->dest_city->city, ['controller' => 'Cities', 'action' => 'view', $reservation->dest_city->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Slug') ?></th>
                <td><?= h($reservation->slug) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Image') ?></th>
                <td><?= h($reservation->image) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Reservations Title Translation') ?></th>
                <td><?= $reservation->has('title_translation') ? $this->Html->link($reservation->title_translation->id, ['controller' => 'Reservations_title_translation', 'action' => 'view', $reservation->title_translation->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Reservations Body Translation') ?></th>
                <td><?= $reservation->has('body_translation') ? $this->Html->link($reservation->body_translation->id, ['controller' => 'Reservations_body_translation', 'action' => 'view', $reservation->body_translation->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($reservation->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($reservation->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($reservation->modified) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Escale') ?></th>
                <td><?= $reservation->escale ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>
    </div>
    <div class="text">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($reservation->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Planes') ?></h4>
        <?php if (!empty($reservation->planes)) : ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Title') ?></th>
                        <th scope="col"><?= __('Seats') ?></th>
                        <th scope="col"><?= __('Details') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
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
                                <?= $this->Html->link(__('View'), ['controller' => 'Planes', 'action' => 'view', $planes->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Planes', 'action' => 'edit', $planes->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Planes', 'action' => 'delete', $planes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planes->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related I18n') ?></h4>
        <?php if (!empty($reservation->_i18n)) : ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Locale') ?></th>
                        <th scope="col"><?= __('Model') ?></th>
                        <th scope="col"><?= __('Foreign Key') ?></th>
                        <th scope="col"><?= __('Field') ?></th>
                        <th scope="col"><?= __('Content') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($reservation->_i18n as $i18n) : ?>
                        <tr>
                            <td><?= h($i18n->id) ?></td>
                            <td><?= h($i18n->locale) ?></td>
                            <td><?= h($i18n->model) ?></td>
                            <td><?= h($i18n->foreign_key) ?></td>
                            <td><?= h($i18n->field) ?></td>
                            <td><?= h($i18n->content) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'I18n', 'action' => 'view', $i18n->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'I18n', 'action' => 'edit', $i18n->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'I18n', 'action' => 'delete', $i18n->id], ['confirm' => __('Are you sure you want to delete # {0}?', $i18n->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>