<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Donor $donor
 */
?>
<div class="blood-donor-profile">
    <div class="profile-container">
        <!-- Side Navigation -->
        <div class="profile-sidebar">
            <div class="sidebar-header">
                <h4 class="heading"><?= __('Donor Actions') ?></h4>
            </div>
            <nav class="sidebar-nav">
                <?= $this->Html->link(__('<i class="fas fa-user-edit"></i> Edit Donor'), ['action' => 'edit', $donor->donorID], 
                    ['class' => 'nav-item btn-edit', 'escape' => false]) ?>
                <?= $this->Form->postLink(__('<i class="fas fa-trash-alt"></i> Delete Donor'), ['action' => 'delete', $donor->donorID], 
                    ['confirm' => __('Are you sure you want to delete donor: {0}?', $donor->donorName), 
                     'class' => 'nav-item btn-delete', 'escape' => false]) ?>
                <?= $this->Html->link(__('<i class="fas fa-list"></i> List Donors'), ['action' => 'index'], 
                    ['class' => 'nav-item btn-list', 'escape' => false]) ?>
                <?= $this->Html->link(__('<i class="fas fa-plus-circle"></i> New Donor'), ['action' => 'add'], 
                    ['class' => 'nav-item btn-new', 'escape' => false]) ?>
            </nav>
            <div class="blood-type-display" style="background: linear-gradient(135deg, <?= $this->Blood->typeColor($donor->bloodType) ?>, #c0392b)">
                <span class="blood-type-label">Blood Type</span>
                <span class="blood-type-value"><?= h($donor->bloodType) ?></span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="profile-content">
            <div class="profile-header">
                <h2><?= h($donor->donorName) ?></h2>
                <div class="donor-id">ID: <?= $this->Number->format($donor->donorID) ?></div>
            </div>
            
            <div class="profile-details">
                <div class="detail-card">
                    <div class="detail-icon">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="detail-content">
                        <h4><?= __('Personal Information') ?></h4>
                        <div class="detail-row">
                            <span class="detail-label"><?= __('NRIC') ?></span>
                            <span class="detail-value"><?= h($donor->nric) ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label"><?= __('Gender') ?></span>
                            <span class="detail-value"><?= h($donor->gender) ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label"><?= __('Age') ?></span>
                            <span class="detail-value"><?= h($donor->age) ?></span>
                        </div>
                    </div>
                </div>

                <div class="detail-card">
                    <div class="detail-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="detail-content">
                        <h4><?= __('Contact Information') ?></h4>
                        <div class="detail-row">
                            <span class="detail-label"><?= __('Address') ?></span>
                            <span class="detail-value"><?= h($donor->address) ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label"><?= __('Phone') ?></span>
                            <span class="detail-value"><?= h($donor->phoneNumber) ?></span>
                        </div>
                    </div>
                </div>

                <div class="detail-card blood-info">
                    <div class="detail-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <div class="detail-content">
                        <h4><?= __('Blood Information') ?></h4>
                        <div class="detail-row">
                            <span class="detail-label"><?= __('Blood Type') ?></span>
                            <span class="detail-value blood-type" style="color: <?= $this->Blood->typeColor($donor->bloodType) ?>">
                                <?= h($donor->bloodType) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced Blood Donor Profile Styles */
:root {
    --blood-red: #e74c3c;
    --blood-dark: #2c3e50;
    --blood-blue: #3498db;
    --blood-green: #2ecc71;
    --blood-purple: #9b59b6;
    --blood-orange: #e67e22;
    --blood-gray: #95a5a6;
    --blood-light: #ecf0f1;
}

.blood-donor-profile {
    font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    background-color: #f5f7fa;
    padding: 20px;
    min-height: 100vh;
}

.profile-container {
    display: flex;
    max-width: 1200px;
    margin: 0 auto;
    background: white;
    border-radius: 12px;
    box-shadow: 0 5px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

/* Sidebar Styles */
.profile-sidebar {
    width: 280px;
    background: linear-gradient(135deg, var(--blood-dark), #1a252f);
    color: white;
    padding: 25px;
}

.sidebar-header {
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    margin-bottom: 20px;
}

.sidebar-header .heading {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    color: white;
    letter-spacing: 0.5px;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 30px;
}

.nav-item {
    padding: 12px 15px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-size: 14px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.nav-item i {
    margin-right: 10px;
    font-size: 15px;
}

.btn-edit {
    background: var(--blood-blue);
    border-left: 4px solid #2980b9;
}

.btn-edit:hover {
    background: #2980b9;
    transform: translateX(3px);
}

.btn-delete {
    background: var(--blood-red);
    border-left: 4px solid #c0392b;
}

.btn-delete:hover {
    background: #c0392b;
    transform: translateX(3px);
}

.btn-list {
    background: var(--blood-green);
    border-left: 4px solid #27ae60;
}

.btn-list:hover {
    background: #27ae60;
    transform: translateX(3px);
}

.btn-new {
    background: var(--blood-purple);
    border-left: 4px solid #8e44ad;
}

.btn-new:hover {
    background: #8e44ad;
    transform: translateX(3px);
}

.blood-type-display {
    margin-top: 20px;
    text-align: center;
    padding: 20px 10px;
    border-radius: 8px;
    font-size: 28px;
    font-weight: bold;
    color: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.blood-type-display::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: rgba(255, 255, 255, 0.3);
}

.blood-type-label {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.9;
    margin-bottom: 5px;
}

.blood-type-value {
    font-size: 32px;
    font-weight: 800;
    display: block;
}

/* Main Content Styles */
.profile-content {
    flex: 1;
    padding: 30px;
    background: #fff;
}

.profile-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.profile-header h2 {
    margin: 0;
    color: var(--blood-dark);
    font-size: 28px;
    font-weight: 600;
}

.donor-id {
    background: #f1f1f1;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 14px;
    color: var(--blood-gray);
    font-weight: 500;
}

.profile-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.detail-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    display: flex;
    transition: all 0.3s ease;
    border: 1px solid #eee;
}

.detail-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    border-color: #ddd;
}

.detail-icon {
    margin-right: 15px;
    font-size: 24px;
    color: var(--blood-blue);
    width: 50px;
    height: 50px;
    background: rgba(52, 152, 219, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.detail-content {
    flex: 1;
}

.detail-content h4 {
    margin-top: 0;
    margin-bottom: 20px;
    color: var(--blood-dark);
    font-size: 18px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #f1f1f1;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    padding-bottom: 12px;
    border-bottom: 1px dashed #eee;
}

.detail-row:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.detail-label {
    font-weight: 500;
    color: var(--blood-gray);
    font-size: 14px;
}

.detail-value {
    color: var(--blood-dark);
    font-weight: 500;
}

.blood-info .detail-icon {
    color: var(--blood-red);
    background: rgba(231, 76, 60, 0.1);
}

.blood-type {
    font-weight: 700;
    font-size: 16px;
}

.eligibility-badge {
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

.eligibility-badge.eligible {
    background: #e8f5e9;
    color: #2e7d32;
}

.eligibility-badge.ineligible {
    background: #ffebee;
    color: #c62828;
}

/* Blood type colors */
.blood-type-A { color: var(--blood-red); }
.blood-type-B { color: var(--blood-blue); }
.blood-type-AB { color: var(--blood-purple); }
.blood-type-O { color: var(--blood-green); }

/* Responsive adjustments */
@media (max-width: 992px) {
    .profile-container {
        flex-direction: column;
    }
    
    .profile-sidebar {
        width: 100%;
    }
}

@media (max-width: 576px) {
    .profile-details {
        grid-template-columns: 1fr;
    }
    
    .profile-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .donor-id {
        margin-top: 10px;
    }
}
</style>