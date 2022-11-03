<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 * @var \Cake\Collection\CollectionInterface|string[] $provincesStates
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
            <?= $this->Html->link(__('List Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cities form content" ng-app="linkedlists" ng-controller="CountriesController">
            <?= $this->Form->create($city) ?>
            <fieldset>
                <legend><?= __('Add City') ?></legend>
                <div>
                    <?= __('Countries') ?> :
                    <select name="country_id" id="country-id" ng-model="country" ng-options="country.country for country in countries track by country.id">
                        <option value=''>Select</option>
                    </select>
                </div>
                <div>
                    <?= __('Provinces') . ' ' . '(States)' ?> :
                    <select name="province_id" id="province-id" ng-disabled="!country" ng-model="provincesStates" ng-options="provinces_states.province_states for provinces_states in country.provinces_states track by provinces_states.id">
                        <option value=''>Select</option>
                    </select>
                </div>
                <?php
                // echo $this->Form->control('country_id', ['options', $countries]);
                //echo $this->Form->control('province_id', ['options' => [__('Please select a Country first')]]);
                echo $this->Form->control('city');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>