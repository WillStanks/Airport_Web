<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?php
$urlToObecCitiesAutocompletedemoJson = $this->Url->build([
    "controller" => "ObecCities",
    "action" => "findObecCities",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToObecCitiesAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Articles/add_edit/obecCityAutocomplete', ['block' => 'scriptBottom']);
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="articles form content">
            <?= $this->Form->create($article, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Article') ?></legend>
                <?php
//                echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
                echo $this->Form->control('title');
//                echo $this->Form->control('slug');

                echo $this->Form->control('obec_city_id', ['label' => __('City') . ' (' . __('Autocomplete demo') . ')', 'type' => 'text', 'id' => 'autocomplete']);

                echo $this->Form->control('body');

                echo $this->Form->control('image_file', ['type' => 'file']);

                echo $this->Form->control('published');
                echo $this->Form->control('tags._ids', ['options' => $tags]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
