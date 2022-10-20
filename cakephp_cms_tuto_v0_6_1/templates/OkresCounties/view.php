<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OkresCounty $okresCounty
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Okres Counties'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Kraj Regions'), ['controller' => 'KrajRegions', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Obec Cities'), ['controller' => 'ObecCities', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="okresCounties view large-9 medium-8 columns content">
    <h3><?= h($okresCounty->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Kraj Region') ?></th>
                <td><?= $okresCounty->has('kraj_region') ? $this->Html->link($okresCounty->kraj_region->nazev, ['controller' => 'KrajRegions', 'action' => 'view', $okresCounty->kraj_region->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Kod') ?></th>
                <td><?= h($okresCounty->kod) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nazev') ?></th>
                <td><?= h($okresCounty->nazev) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($okresCounty->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Obec Cities') ?></h4>
        <?php if (!empty($okresCounty->obec_cities)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Kraj Region Id') ?></th>
                    <th scope="col"><?= __('Okres County Id') ?></th>
                    <th scope="col"><?= __('Kod') ?></th>
                    <th scope="col"><?= __('Nazev') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($okresCounty->obec_cities as $obecCities): ?>
                <tr>
                    <td><?= h($obecCities->id) ?></td>
                    <td><?= h($obecCities->kraj_region_id) ?></td>
                    <td><?= h($obecCities->okres_county_id) ?></td>
                    <td><?= h($obecCities->kod) ?></td>
                    <td><?= h($obecCities->nazev) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'ObecCities', 'action' => 'view', $obecCities->id], ['class' => 'btn btn-secondary']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
