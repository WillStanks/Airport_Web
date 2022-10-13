<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $planes
 */
?>

<?php
$urlToCitiesAutoCompleteJson = $this->Url->build([
    "controller" => "Cities",
    "action" => "findCities",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCitiesAutoCompleteJson . '";', ['block' => true]);
echo $this->Html->script('Reservations/add_edit/cityAutocomplete', ['block' => 'scriptBottom']);
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reservation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reservations form content">
            <?= $this->Form->create($reservation, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Reservation') ?></legend>
                <?php
                // echo $this->Form->control('user_id', ['type' => 'hidden']);
                echo $this->Form->control('title');
                echo $this->Form->control('depCity_id', ['label' => '(depCity_id)', 'type' => 'hidden']);
                echo $this->Form->control('destCity_id', ['label' => '(destCity_id)', 'type' => 'hidden']);
                ?>

                <div class="input text">
                    <label for="autocomplete"><?= __("DepCity") . ' (' . __('Autocomplete') . ')' ?></label>
                    <input id="autocompleteDep" type="text" value="<?= $depCity->city ?>">
                </div>


                <div class="input text">
                    <label for="autocomplete"><?= __("DestCity") . ' (' . __('Autocomplete') . ')' ?></label>
                    <input id="autocompleteDest" type="text" value="<?= $destCity->city ?>">
                </div>
                <?php
                echo $this->Form->control('body');
                echo @$this->Html->image('reservations/' . $reservation->image, ['style' => 'max_width:50px;height:50px;border-radius:40%;']);
                echo $this->Form->control('image_file', ['type' => 'file']);
                echo $this->Form->control('escale');
                echo $this->Form->control('planes._ids', ['options' => $planes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>