<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObecCity $obecCity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Obec City'), ['action' => 'edit', $obecCity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Obec City'), ['action' => 'delete', $obecCity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $obecCity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Obec Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Obec City'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="obecCities view content">
            <h3><?= h($obecCity->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Kraj Region') ?></th>
                    <td><?= $obecCity->has('kraj_region') ? $this->Html->link($obecCity->kraj_region->id, ['controller' => 'KrajRegions', 'action' => 'view', $obecCity->kraj_region->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Okres County') ?></th>
                    <td><?= $obecCity->has('okres_county') ? $this->Html->link($obecCity->okres_county->id, ['controller' => 'OkresCounties', 'action' => 'view', $obecCity->okres_county->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Kod') ?></th>
                    <td><?= h($obecCity->kod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nazev') ?></th>
                    <td><?= h($obecCity->nazev) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($obecCity->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Articles') ?></h4>
                <?php if (!empty($obecCity->articles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Obec City Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Body') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Published') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($obecCity->articles as $articles) : ?>
                        <tr>
                            <td><?= h($articles->id) ?></td>
                            <td><?= h($articles->user_id) ?></td>
                            <td><?= h($articles->obec_city_id) ?></td>
                            <td><?= h($articles->title) ?></td>
                            <td><?= h($articles->slug) ?></td>
                            <td><?= h($articles->body) ?></td>
                            <td><?= h($articles->image) ?></td>
                            <td><?= h($articles->published) ?></td>
                            <td><?= h($articles->created) ?></td>
                            <td><?= h($articles->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]) ?>
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
