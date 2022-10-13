<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OkresCounty $okresCounty
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Okres County'), ['action' => 'edit', $okresCounty->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Okres County'), ['action' => 'delete', $okresCounty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $okresCounty->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Okres Counties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Okres County'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="okresCounties view content">
            <h3><?= h($okresCounty->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Kraj Region') ?></th>
                    <td><?= $okresCounty->has('kraj_region') ? $this->Html->link($okresCounty->kraj_region->id, ['controller' => 'KrajRegions', 'action' => 'view', $okresCounty->kraj_region->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Kod') ?></th>
                    <td><?= h($okresCounty->kod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nazev') ?></th>
                    <td><?= h($okresCounty->nazev) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($okresCounty->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Obec Cities') ?></h4>
                <?php if (!empty($okresCounty->obec_cities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Kraj Region Id') ?></th>
                            <th><?= __('Okres County Id') ?></th>
                            <th><?= __('Kod') ?></th>
                            <th><?= __('Nazev') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($okresCounty->obec_cities as $obecCities) : ?>
                        <tr>
                            <td><?= h($obecCities->id) ?></td>
                            <td><?= h($obecCities->kraj_region_id) ?></td>
                            <td><?= h($obecCities->okres_county_id) ?></td>
                            <td><?= h($obecCities->kod) ?></td>
                            <td><?= h($obecCities->nazev) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ObecCities', 'action' => 'view', $obecCities->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ObecCities', 'action' => 'edit', $obecCities->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ObecCities', 'action' => 'delete', $obecCities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $obecCities->id)]) ?>
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
