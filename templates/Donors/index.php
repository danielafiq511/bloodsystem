<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Donor> $donors
 */
?>
<div class="blood-system-container">
    <div class="blood-system-main">
        <div class="blood-system-card">
            <div class="blood-system-card-header">
                <h2 class="blood-system-title"><?= __('Blood Donor Management') ?></h2>
                <?= $this->Html->link(__('+ New Donor'), ['action' => 'add'], 
                    ['class' => 'blood-system-button blood-system-button-primary']) ?>
            </div>
            
            <div class="blood-system-table-container">
                <div class="blood-system-table-responsive">
                    <table class="blood-system-table">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('donorID', 'ID') ?></th>
                                <th><?= $this->Paginator->sort('donorName', 'Name') ?></th>
                                <th><?= $this->Paginator->sort('bloodType', 'Blood Type') ?></th>
                                <th><?= $this->Paginator->sort('gender') ?></th>
                                <th><?= $this->Paginator->sort('age') ?></th>
                                <th><?= $this->Paginator->sort('phoneNumber', 'Phone') ?></th>
                                <th class="blood-system-actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($donors as $donor): ?>
                            <tr>
                                <td><?= $this->Number->format($donor->donorID) ?></td>
                                <td>
                                    <strong><?= h($donor->donorName) ?></strong>
                                    <div class="blood-system-subtext"><?= h($donor->nric) ?></div>
                                </td>
                                <td>
                                    <span class="blood-type-badge blood-type-<?= str_replace(['+', '-'], ['pos', 'neg'], h($donor->bloodType)) ?>">
                                        <?= h($donor->bloodType) ?>
                                    </span>
                                </td>
                                <td><?= h($donor->gender) ?></td>
                                <td><?= h($donor->age) ?></td>
                                <td><?= h($donor->phoneNumber) ?></td>
                                <td class="blood-system-actions">
                                    <div class="blood-system-action-buttons">
                                        <?= $this->Html->link(
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>',
                                            ['action' => 'view', $donor->donorID],
                                            ['class' => 'blood-system-action-button blood-system-view', 'escape' => false]
                                        ) ?>
                                        <?= $this->Html->link(
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>',
                                            ['action' => 'edit', $donor->donorID],
                                            ['class' => 'blood-system-action-button blood-system-edit', 'escape' => false]
                                        ) ?>
                                        <?= $this->Form->postLink(
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>',
                                            ['action' => 'delete', $donor->donorID],
                                            [
                                                'class' => 'blood-system-action-button blood-system-delete',
                                                'escape' => false,
                                                'confirm' => __('Are you sure you want to delete donor #{0}?', $donor->donorID)
                                            ]
                                        ) ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="blood-system-pagination">
                    <div class="blood-system-pagination-info">
                        <?= $this->Paginator->counter(__('Showing {{start}} to {{end}} of {{count}} donors')) ?>
                    </div>
                    <ul class="blood-system-pagination-controls">
                        <?= $this->Paginator->first('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/><path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg>', ['escape' => false]) ?>
                        <?= $this->Paginator->prev('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg>', ['escape' => false]) ?>
                        <?= $this->Paginator->numbers(['modulus' => 3]) ?>
                        <?= $this->Paginator->next('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>', ['escape' => false]) ?>
                        <?= $this->Paginator->last('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/><path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/></svg>', ['escape' => false]) ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Base styles from previous design */
.blood-system-container {
    display: flex;
    min-height: 100vh;
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
}

.blood-system-main {
    flex: 1;
    padding: 30px;
}

.blood-system-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.blood-system-card-header {
    background: linear-gradient(135deg, #e63946 0%, #c1121f 100%);
    color: white;
    padding: 20px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.blood-system-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.blood-system-button {
    background: linear-gradient(135deg, #e63946 0%, #c1121f 100%);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 2px 10px rgba(230, 57, 70, 0.3);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.blood-system-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(230, 57, 70, 0.4);
}

/* Table specific styles */
.blood-system-table-container {
    padding: 20px;
}

.blood-system-table-responsive {
    overflow-x: auto;
}

.blood-system-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.blood-system-table th {
    background-color: #f8f9fa;
    color: #495057;
    font-weight: 600;
    text-align: left;
    padding: 12px 15px;
    border-bottom: 2px solid #e9ecef;
}

.blood-system-table td {
    padding: 12px 15px;
    border-bottom: 1px solid #e9ecef;
    vertical-align: middle;
}

.blood-system-table tr:hover td {
    background-color: #fff5f5;
}

.blood-system-subtext {
    font-size: 0.8rem;
    color: #6c757d;
    margin-top: 4px;
}

/* Blood type badges */
.blood-type-badge {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 600;
    color: white;
}

.blood-type-Apos { background-color: #d90429; }
.blood-type-Aneg { background-color: #ef233c; }
.blood-type-Bpos { background-color: #1b9aaa; }
.blood-type-Bneg { background-color: #48cae4; }
.blood-type-ABpos { background-color: #9b5de5; }
.blood-type-ABneg { background-color: #c77dff; }
.blood-type-Opos { background-color: #f77f00; }
.blood-type-Oneg { background-color: #fcbf49; }

/* Action buttons */
.blood-system-actions {
    width: 150px;
}

.blood-system-action-buttons {
    display: flex;
    gap: 8px;
}

.blood-system-action-button {
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.2s;
    color: white;
    text-decoration: none;
}

.blood-system-view {
    background-color: #4361ee;
}

.blood-system-edit {
    background-color: #4cc9f0;
}

.blood-system-delete {
    background-color: #f72585;
}

.blood-system-action-button:hover {
    transform: scale(1.1);
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

/* Pagination styles */
.blood-system-pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    padding: 0 10px;
}

.blood-system-pagination-info {
    color: #6c757d;
    font-size: 0.9rem;
}

.blood-system-pagination-controls {
    display: flex;
    gap: 5px;
    list-style: none;
    padding: 0;
    margin: 0;
}

.blood-system-pagination-controls li a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #f8f9fa;
    color: #495057;
    text-decoration: none;
    transition: all 0.2s;
}

.blood-system-pagination-controls li a:hover {
    background-color: #e63946;
    color: white;
}

.blood-system-pagination-controls li.active a {
    background-color: #e63946;
    color: white;
    font-weight: bold;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .blood-system-table th:nth-child(3),
    .blood-system-table td:nth-child(3) {
        display: none;
    }
}

@media (max-width: 768px) {
    .blood-system-card-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .blood-system-pagination {
        flex-direction: column;
        gap: 15px;
    }
    
    .blood-system-table th:nth-child(5),
    .blood-system-table td:nth-child(5),
    .blood-system-table th:nth-child(6),
    .blood-system-table td:nth-child(6) {
        display: none;
    }
}
</style>