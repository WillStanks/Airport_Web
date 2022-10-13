<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KrajRegion $krajRegion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Kraj Region'), ['action' => 'edit', $krajRegion->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Kraj Region'), ['action' => 'delete', $krajRegion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $krajRegion->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Kraj Regions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Kraj Region'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="krajRegions view content">
            <h3><?= h($krajRegion->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Kod') ?></th>
                    <td><?= h($krajRegion->kod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nazev') ?></th>
                    <td><?= h($krajRegion->nazev) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($krajRegion->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Obec Cities') ?></h4>
                <?php if (!empty($krajRegion->obec_cities)) : ?>
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
                        <?php foreach ($krajRegion->obec_cities as $obecCities) : ?>
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
            <div class="related">
                <h4><?= __('Related Okres Counties') ?></h4>
                <?php if (!empty($krajRegion->okres_counties)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Kraj Region Id') ?></th>
                            <th><?= __('Kod') ?></th>
                            <th><?= __('Nazev') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($krajRegion->okres_counties as $okresCounties) : ?>
                        <tr>
                            <td><?= h($okresCounties->id) ?></td>
                            <td><?= h($okresCounties->kraj_region_id) ?></td>
                            <td><?= h($okresCounties->kod) ?></td>
                            <td><?= h($okresCounties->nazev) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OkresCounties', 'action' => 'view', $okresCounties->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OkresCounties', 'action' => 'edit', $okresCounties->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OkresCounties', 'action' => 'delete', $okresCounties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $okresCounties->id)]) ?>
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
