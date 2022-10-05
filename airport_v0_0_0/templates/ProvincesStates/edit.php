<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProvincesState $provincesState
 * @var string[]|\Cake\Collection\CollectionInterface $countries
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $provincesState->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $provincesState->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Provinces States'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provincesStates form content">
            <?= $this->Form->create($provincesState) ?>
            <fieldset>
                <legend><?= __('Edit Provinces State') ?></legend>
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
