<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProvincesState $provincesState
 * @var \Cake\Collection\CollectionInterface|string[] $countries
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Provinces States'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provincesStates form content">
            <?= $this->Form->create($provincesState) ?>
            <fieldset>
                <legend><?= __('Add Provinces State') ?></legend>
                <?php
                    echo $this->Form->control('country_id', ['options' => $countries]);
                    echo $this->Form->control('province_states');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
