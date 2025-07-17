<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Donor> $donors
 */
?>
<div class="donors index content">
    <?= $this->Html->link(__('New Donor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Donors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('donorID') ?></th>
                    <th><?= $this->Paginator->sort('donorName') ?></th>
                    <th><?= $this->Paginator->sort('nric') ?></th>
                    <th><?= $this->Paginator->sort('phoneNumber') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('bloodType') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('age') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donors as $donor): ?>
                <tr>
                    <td><?= $this->Number->format($donor->donorID) ?></td>
                    <td><?= h($donor->donorName) ?></td>
                    <td><?= h($donor->nric) ?></td>
                    <td><?= h($donor->phoneNumber) ?></td>
                    <td><?= h($donor->address) ?></td>
                    <td><?= h($donor->bloodType) ?></td>
                    <td><?= h($donor->gender) ?></td>
                    <td><?= h($donor->age) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $donor->donorID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $donor->donorID]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $donor->donorID],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $donor->donorID),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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