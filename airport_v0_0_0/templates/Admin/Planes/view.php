<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plane $plane
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Plane'), ['action' => 'edit', $plane->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Plane'), ['action' => 'delete', $plane->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plane->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Planes'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Plane'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="planes view large-9 medium-8 columns content">
    <h3><?= h($plane->title) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Title') ?></th>
                <td><?= h($plane->title) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Details') ?></th>
                <td><?= h($plane->details) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($plane->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Seats') ?></th>
                <td><?= $this->Number->format($plane->seats) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($plane->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($plane->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Reservations') ?></h4>
        <?php if (!empty($plane->reservations)) : ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Title') ?></th>
                        <th scope="col"><?= __('DepCity Id') ?></th>
                        <th scope="col"><?= __('DestCity Id') ?></th>
                        <th scope="col"><?= __('Slug') ?></th>
                        <th scope="col"><?= __('Body') ?></th>
                        <th scope="col"><?= __('Image') ?></th>
                        <th scope="col"><?= __('Escale') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($plane->reservations as $reservations) : ?>
                        <tr>
                            <td><?= h($reservations->id) ?></td>
                            <td><?= h($reservations->user_id) ?></td>
                            <td><?= h($reservations->title) ?></td>
                            <td><?= h($reservations->depCity_id) ?></td>
                            <td><?= h($reservations->destCity_id) ?></td>
                            <td><?= h($reservations->slug) ?></td>
                            <td><?= h($reservations->body) ?></td>
                            <td><?= h($reservations->image) ?></td>
                            <td><?= h($reservations->escale) ?></td>
                            <td><?= h($reservations->created) ?></td>
                            <td><?= h($reservations->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['prefix' => false, 'controller' => 'Reservations', 'action' => 'view', $reservations->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['prefix' => false, 'controller' => 'Reservations', 'action' => 'edit', $reservations->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['prefix' => false, 'controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>