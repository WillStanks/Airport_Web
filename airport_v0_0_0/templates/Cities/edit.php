<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 * @var string[]|\Cake\Collection\CollectionInterface $provincesStates
 */
?>
<?php

echo $this->Html->script(
    [
        'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
    ],
    ['block' => 'scriptLibraries']
);

$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Countries",
    "action" => "getCountries",
    "_ext" => "json"
]);

echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Cities/add_edit', ['block' => 'scriptBottom']);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $city->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $city->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cities form content" ng-app="linkedlists" ng-controller="CountriesController">
            <?= $this->Form->create($city) ?>
            <fieldset>
                <legend><?= __('Edit City') ?></legend>
                <input type="hidden" ng-init="provinceStateId =<?= $city["province_id"] ?>" ng-model="provinceStateId">
                <div>
                    <?= __('Country') ?> :
                    <select name="country_id" id="country-id" ng-model="country" ng-options="country.country for country in countries track by country.id">
                    </select>
                </div>
                <div>
                    <?= __('Province') ?> :
                    <select name="province_id" id="province-id" ng-model="province" ng-options="provinces_states.province_states for provinces_states in country.provinces_states track by provinces_states.id">
                    </select>
                </div>
                <?php
                echo $this->Form->control('city');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>