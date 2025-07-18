<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hospital $hospital
 */
?>
<div class="blood-system-container">
    <div class="blood-system-sidebar">
        <div class="blood-system-nav">
            <h4 class="blood-system-nav-title"><?= __('Hospital Actions') ?></h4>
            <?= $this->Html->link(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="blood-system-nav-icon">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg> ' . __('Edit Hospital'),
                ['action' => 'edit', $hospital->hospitalID],
                ['class' => 'blood-system-nav-link', 'escape' => false]
            ) ?>
            <?= $this->Form->postLink(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="blood-system-nav-icon">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg> ' . __('Delete Hospital'),
                ['action' => 'delete', $hospital->hospitalID],
                [
                    'confirm' => __('Are you sure you want to delete hospital #{0}?', $hospital->hospitalID),
                    'class' => 'blood-system-nav-link blood-system-nav-link-danger',
                    'escape' => false
                ]
            ) ?>
            <?= $this->Html->link(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="blood-system-nav-icon">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg> ' . __('List Hospitals'),
                ['action' => 'index'],
                ['class' => 'blood-system-nav-link', 'escape' => false]
            ) ?>
            <?= $this->Html->link(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="blood-system-nav-icon">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> ' . __('New Hospital'),
                ['action' => 'add'],
                ['class' => 'blood-system-nav-link', 'escape' => false]
            ) ?>
        </div>
    </div>
    
    <div class="blood-system-main">
        <div class="blood-system-card">
            <div class="blood-system-card-header">
                <div class="blood-system-header-content">
                    <h2 class="blood-system-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <?= h($hospital->hospitalName) ?>
                    </h2>
                    <div class="blood-system-subtitle">Hospital ID: #<?= $this->Number->format($hospital->hospitalID) ?></div>
                </div>
            </div>
            
            <div class="blood-system-card-body">
                <div class="blood-system-details-grid">
                    <div class="blood-system-detail-item">
                        <div class="blood-system-detail-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <?= __('Address') ?>
                        </div>
                        <div class="blood-system-detail-value"><?= h($hospital->address) ?></div>
                    </div>
                    
                    <div class="blood-system-detail-item">
                        <div class="blood-system-detail-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <?= __('Contact Information') ?>
                        </div>
                        <div class="blood-system-detail-value"><?= h($hospital->contactInfo) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Base Container Styles */
.blood-system-container {
    display: flex;
    min-height: 100vh;
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
    background-color: #f8f9fa;
}

/* Sidebar Styles */
.blood-system-sidebar {
    width: 280px;
    background: linear-gradient(135deg, #1a659e 0%, #004e89 100%);
    color: white;
    padding: 20px 0;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}

.blood-system-nav {
    padding: 0 15px;
}

.blood-system-nav-title {
    color: white;
    font-size: 1.1rem;
    padding: 10px 15px;
    margin-bottom: 15px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.blood-system-nav-link {
    display: flex;
    align-items: center;
    color: rgba(255,255,255,0.9);
    padding: 12px 15px;
    margin-bottom: 5px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.blood-system-nav-link-danger {
    color: #ff9e9e;
}

.blood-system-nav-link:hover {
    background-color: rgba(255,255,255,0.1);
    color: white;
    transform: translateX(5px);
}

.blood-system-nav-icon {
    margin-right: 10px;
    width: 16px;
    height: 16px;
}

/* Main Content Styles */
.blood-system-main {
    flex: 1;
    padding: 30px;
}

/* Card Styles */
.blood-system-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.blood-system-card-header {
    background: linear-gradient(135deg, #ef8354 0%, #ee6c4d 100%);
    color: white;
    padding: 25px 30px;
}

.blood-system-header-content {
    max-width: 800px;
}

.blood-system-title {
    margin: 0;
    font-size: 1.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 12px;
}

.blood-system-title svg {
    stroke-width: 1.8;
}

.blood-system-subtitle {
    margin: 8px 0 0;
    font-size: 1rem;
    opacity: 0.9;
    font-weight: 400;
}

.blood-system-card-body {
    padding: 30px;
}

/* Details Grid Styles */
.blood-system-details-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 25px;
    max-width: 800px;
}

.blood-system-detail-item {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.blood-system-detail-label {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #64748b;
    font-weight: 600;
    font-size: 0.95rem;
}

.blood-system-detail-value {
    font-size: 1.1rem;
    padding-left: 30px;
    color: #334155;
    line-height: 1.5;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .blood-system-container {
        flex-direction: column;
    }
    
    .blood-system-sidebar {
        width: 100%;
    }
    
    .blood-system-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
    
    .blood-system-nav-link {
        flex: 1;
        min-width: 150px;
    }
    
    .blood-system-main {
        padding: 20px;
    }
}

@media (max-width: 576px) {
    .blood-system-card-header {
        padding: 20px;
    }
    
    .blood-system-card-body {
        padding: 20px;
    }
    
    .blood-system-title {
        font-size: 1.5rem;
    }
    
    .blood-system-detail-value {
        padding-left: 0;
    }
}
</style>