<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Appointment> $appointments
 */
?>
<div class="appointments index content">
    <?= $this->Html->link(__('New Appointment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Appointments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('appointmentID') ?></th>
                    <th><?= $this->Paginator->sort('donorID') ?></th>
                    <th><?= $this->Paginator->sort('donorName') ?></th>
                    <th><?= $this->Paginator->sort('nric') ?></th>
                    <th><?= $this->Paginator->sort('phoneNumber') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('age') ?></th>
                    <th><?= $this->Paginator->sort('hospitalID') ?></th>
                    <th><?= $this->Paginator->sort('hospitalName') ?></th>
                    <th><?= $this->Paginator->sort('dateTime') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= $this->Number->format($appointment->appointmentID) ?></td>
                    <td><?= h($appointment->donorID) ?></td>
                    <td><?= h($appointment->donorName) ?></td>
                    <td><?= h($appointment->nric) ?></td>
                    <td><?= h($appointment->phoneNumber) ?></td>
                    <td><?= h($appointment->gender) ?></td>
                    <td><?= h($appointment->age) ?></td>
                    <td><?= h($appointment->hospitalID) ?></td>
                    <td><?= h($appointment->hospitalName) ?></td>
                    <td><?= h($appointment->dateTime) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $appointment->appointmentID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appointment->appointmentID]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $appointment->appointmentID],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $appointment->appointmentID),
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