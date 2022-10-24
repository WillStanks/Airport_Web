<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 * @var \App\Model\Entity\DepCity[]|\Cake\Collection\CollectionInterface $depCities
 * @var \App\Model\Entity\DestCity[]|\Cake\Collection\CollectionInterface $destCities
 * @var \App\Model\Entity\Reservations_title_translation[]|\Cake\Collection\CollectionInterface $reservationsTitleTranslation
 * @var \App\Model\Entity\Reservations_body_translation[]|\Cake\Collection\CollectionInterface $reservationsBodyTranslation
 * @var \App\Model\Entity\I18n[]|\Cake\Collection\CollectionInterface $i18n
 * @var \App\Model\Entity\Plane[]|\Cake\Collection\CollectionInterface $planes
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Dep Cities'), ['controller' => 'Cities', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Dep City'), ['controller' => 'Cities', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Reservations Title Translation'), ['controller' => 'Reservations_title_translation', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Reservations Title Translation'), ['controller' => 'Reservations_title_translation', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Reservations Body Translation'), ['controller' => 'Reservations_body_translation', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Reservations Body Translation'), ['controller' => 'Reservations_body_translation', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List I18n'), ['controller' => 'I18n', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New I18n'), ['controller' => 'I18n', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Planes'), ['controller' => 'Planes', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Plane'), ['controller' => 'Planes', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="reservations form content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Edit Reservation') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('title');
            echo $this->Form->control('depCity_id', ['options' => $depCities]);
            echo $this->Form->control('destCity_id', ['options' => $destCities]);
            echo $this->Form->control('slug');
            echo $this->Form->control('body');
            echo $this->Form->control('image');
            echo $this->Form->control('escale');
            echo $this->Form->control('planes._ids', ['options' => $planes]);
                ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
