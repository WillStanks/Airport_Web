<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Countries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Country'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="countries view content">
            <h3><?= h($country->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($country->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($country->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Provinces States') ?></h4>
                <?php if (!empty($country->provinces_states)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Country Id') ?></th>
                            <th><?= __('Province States') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($country->provinces_states as $provincesStates) : ?>
                        <tr>
                            <td><?= h($provincesStates->id) ?></td>
                            <td><?= h($provincesStates->country_id) ?></td>
                            <td><?= h($provincesStates->province_states) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProvincesStates', 'action' => 'view', $provincesStates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProvincesStates', 'action' => 'edit', $provincesStates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProvincesStates', 'action' => 'delete', $provincesStates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provincesStates->id)]) ?>
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
