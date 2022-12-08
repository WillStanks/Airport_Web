<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File[]|\Cake\Collection\CollectionInterface $files
 */
?>
<?php
$urlRedirectToIndex = $this->Url->build([
    "controller" => "Files",
    "action" => "index"
]);
echo $this->Html->scriptBlock('var urlRedirectToIndex = "' . $urlRedirectToIndex . '";', ['block' => true]);
echo $this->Html->script('dropzone/dropzone', ['block' => 'scriptLibraries']);
echo $this->Html->script('dropzone/RedirectToIndex', ['block' => 'scriptBottom']);
?>
<div class="files index content">
    <?= $this->Html->link(__('New File'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Files') ?></h3>
    <div class="table-responsive image_upload_div">
        <?php
        echo $this->Form->create($file, [
            'url' => [
                'controller' => 'Files',
                'action' => 'add'
            ],
            'method' => 'post',
            'id' => 'my-awesome-dropzone',
            'class' => 'dropzone',
            'type' => 'file',
            'autocomplete' => 'off'
        ]);
        ?>
        <div class="dz-message" data-dz-message>
            <h5>(<?= __('Drop files here to upload') ?>)</h5>
        </div>

        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= __('Image') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($files as $file) : ?>
                    <tr>
                        <td><?= $this->Number->format($file->id) ?></td>
                        <td><?= h($file->name) ?></td>
                        <td>
                            <?= $this->Html->image($file->path . $file->name, ['style' => 'max-width:50px;height:50px;border-radius:50%;']); ?>

                        </td>
                        <td><?= h($file->created) ?></td>
                        <td><?= h($file->modified) ?></td>
                        <td><?= h($file->status) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $file->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $file->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->Form->end() ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>