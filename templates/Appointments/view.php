<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>
<!-- Add this in your layout's head section if not already present -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="appointment-view-container">
    <div class="row">
        <aside class="sidebar-column">
            <div class="side-nav-card">
                <h4 class="sidebar-heading"><?= __('Appointment Actions') ?></h4>
                <nav class="sidebar-nav">
                    <?= $this->Html->link(
                        __('<i class="fas fa-edit"></i> Edit Appointment'), 
                        ['action' => 'edit', $appointment->appointmentID], 
                        ['class' => 'side-nav-item btn-edit', 'escape' => false]
                    ) ?>
                    <?= $this->Form->postLink(
                        __('<i class="fas fa-trash-alt"></i> Delete Appointment'), 
                        ['action' => 'delete', $appointment->appointmentID], 
                        [
                            'confirm' => __('Are you sure you want to delete appointment #{0}?', $appointment->appointmentID), 
                            'class' => 'side-nav-item btn-delete',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        __('<i class="fas fa-list"></i> List Appointments'), 
                        ['action' => 'index'], 
                        ['class' => 'side-nav-item btn-list', 'escape' => false]
                    ) ?>
                    <?= $this->Html->link(
                        __('<i class="fas fa-plus-circle"></i> New Appointment'), 
                        ['action' => 'add'], 
                        ['class' => 'side-nav-item btn-new', 'escape' => false]
                    ) ?>
                </nav>
            </div>
        </aside>

        <div class="content-column">
            <div class="appointment-detail-card">
                <div class="appointment-header">
                    <h3>
                        <i class="fas fa-calendar-check"></i> 
                        <?= h($appointment->donorName) ?>'s Appointment
                    </h3>
                    <div class="appointment-id">
                        ID: <?= $this->Number->format($appointment->appointmentID) ?>
                    </div>
                </div>

                <div class="detail-sections">
                    <div class="detail-section donor-info">
                        <h4><i class="fas fa-user"></i> Donor Information</h4>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <span class="detail-label">Name</span>
                                <span class="detail-value"><?= h($appointment->donorName) ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">NRIC</span>
                                <span class="detail-value"><?= h($appointment->nric) ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Phone</span>
                                <span class="detail-value"><?= h($appointment->phoneNumber) ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Gender</span>
                                <span class="detail-value"><?= h($appointment->gender) ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Age</span>
                                <span class="detail-value"><?= h($appointment->age) ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Donor ID</span>
                                <span class="detail-value"><?= $this->Number->format($appointment->donorID) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="detail-section appointment-info">
                        <h4><i class="fas fa-hospital"></i> Appointment Details</h4>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <span class="detail-label">Hospital</span>
                                <span class="detail-value"><?= h($appointment->hospitalName) ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Hospital ID</span>
                                <span class="detail-value"><?= $this->Number->format($appointment->hospitalID) ?></span>
                            </div>
                            <div class="detail-item highlight">
                                <span class="detail-label">Date & Time</span>
                                <span class="detail-value">
                                    <i class="fas fa-clock"></i> 
                                    <?= date('F j, Y', strtotime($appointment->dateTime)) ?>
                                    <span class="time"><?= date('h:i A', strtotime($appointment->dateTime)) ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern Appointment View Styles */
:root {
    --primary-color: #e74c3c;
    --secondary-color: #2c3e50;
    --accent-color: #3498db;
    --light-gray: #f8f9fa;
    --medium-gray: #e9ecef;
    --dark-gray: #6c757d;
    --success-color: #2ecc71;
    --danger-color: #e74c3c;
    --warning-color: #f39c12;
}

.appointment-view-container {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -15px;
}

.sidebar-column {
    flex: 0 0 250px;
    padding: 0 15px;
}

.content-column {
    flex: 1;
    padding: 0 15px;
}

/* Sidebar Styles */
.side-nav-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    padding: 20px;
    margin-bottom: 20px;
}

.sidebar-heading {
    color: var(--secondary-color);
    font-size: 18px;
    margin: 0 0 20px 0;
    padding-bottom: 10px;
    border-bottom: 1px solid var(--medium-gray);
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.side-nav-item {
    padding: 12px 15px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-size: 14px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.side-nav-item i {
    margin-right: 10px;
    font-size: 15px;
}

.btn-edit {
    background-color: var(--accent-color);
}

.btn-edit:hover {
    background-color: #2980b9;
    transform: translateX(5px);
}

.btn-delete {
    background-color: var(--danger-color);
}

.btn-delete:hover {
    background-color: #c0392b;
    transform: translateX(5px);
}

.btn-list {
    background-color: var(--secondary-color);
}

.btn-list:hover {
    background-color: #1a252f;
    transform: translateX(5px);
}

.btn-new {
    background-color: var(--success-color);
}

.btn-new:hover {
    background-color: #27ae60;
    transform: translateX(5px);
}

/* Main Content Styles */
.appointment-detail-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    padding: 25px;
}

.appointment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px solid var(--medium-gray);
}

.appointment-header h3 {
    margin: 0;
    color: var(--secondary-color);
    font-size: 24px;
    display: flex;
    align-items: center;
}

.appointment-header h3 i {
    margin-right: 12px;
    color: var(--primary-color);
}

.appointment-id {
    background: var(--light-gray);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 14px;
    color: var(--dark-gray);
}

.detail-sections {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.detail-section {
    background: var(--light-gray);
    border-radius: 8px;
    padding: 20px;
}

.detail-section h4 {
    margin: 0 0 15px 0;
    color: var(--secondary-color);
    font-size: 18px;
    display: flex;
    align-items: center;
}

.detail-section h4 i {
    margin-right: 10px;
    color: var(--primary-color);
}

.detail-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
}

.detail-item {
    background: white;
    border-radius: 6px;
    padding: 15px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.detail-item.highlight {
    background: rgba(231, 76, 60, 0.05);
    border-left: 4px solid var(--primary-color);
}

.detail-label {
    font-size: 13px;
    color: var(--dark-gray);
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.detail-value {
    font-size: 15px;
    color: var(--secondary-color);
    font-weight: 500;
    display: flex;
    align-items: center;
}

.detail-value i {
    margin-right: 8px;
}

.time {
    margin-left: 10px;
    font-weight: 600;
    color: var(--primary-color);
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .sidebar-column {
        flex: 0 0 100%;
        margin-bottom: 30px;
    }
    
    .content-column {
        flex: 0 0 100%;
    }
}

@media (max-width: 576px) {
    .detail-grid {
        grid-template-columns: 1fr;
    }
    
    .appointment-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .appointment-id {
        margin-top: 10px;
    }
}
</style>