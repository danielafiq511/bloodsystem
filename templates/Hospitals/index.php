<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Hospital> $hospitals
 */
?>
<!-- Navbar -->
<nav class="navbar">
  <div class="nav-container">
    <div class="logo-container">
      <img src="imgs/BloodBase.png" alt="Logo" class="navbar-logo" />
      <a class="logo">Blood Base</a>
    </div>

    <ul class="nav-menu" id="navMenu">
      <li><a href="http://localhost/bloodbases/" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
      <li><a href="http://localhost/bloodbases/donors" class="nav-link"><i class="fas fa-user"></i> Donors</a></li>
      <li><a href="http://localhost/bloodbases/hospitals" class="nav-link"><i class="fas fa-hospital"></i> Hospitals</a></li>
      <li><a href="http://localhost/bloodbases/appointments" class="nav-link"><i class="fas fa-calendar-alt"></i> Appointments</a></li>
      <li><a href="#about" class="nav-link"><i class="fas fa-info-circle"></i> About Us</a></li>
      <li><a href="#" class="nav-link donate-btn"><i class="fas fa-tint"></i> Donate Now</a></li>
    </ul>
    
    <!-- Mobile menu button -->
    <button class="mobile-menu-btn">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</nav>

<div class="blood-system-container">
    <div class="blood-system-main">
        <div class="blood-system-card">
            <div class="blood-system-card-header">
                <div class="blood-system-header-content">
                    <h2 class="blood-system-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                        <?= __('Hospital Directory') ?>
                    </h2>
                    <p class="blood-system-subtitle">Manage partner hospitals and their information</p>
                </div>
                <?= $this->Html->link(__('+ Add Hospital'), ['action' => 'add'], 
                    ['class' => 'blood-system-button blood-system-button-primary']) ?>
            </div>
            
            <div class="blood-system-table-container">
                <div class="blood-system-table-responsive">
                    <table class="blood-system-table">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('hospitalID', 'ID') ?></th>
                                <th><?= $this->Paginator->sort('hospitalName', 'Hospital Name') ?></th>
                                <th><?= $this->Paginator->sort('address') ?></th>
                                <th><?= $this->Paginator->sort('contactInfo', 'Contact') ?></th>
                                <th class="blood-system-actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hospitals as $hospital): ?>
                            <tr>
                                <td class="blood-system-id">#<?= $this->Number->format($hospital->hospitalID) ?></td>
                                <td>
                                    <strong><?= h($hospital->hospitalName) ?></strong>
                                </td>
                                <td>
                                    <div class="blood-system-address">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="blood-system-icon">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        <?= h($hospital->address) ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="blood-system-contact">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="blood-system-icon">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                        </svg>
                                        <?= h($hospital->contactInfo) ?>
                                    </div>
                                </td>
                                <td class="blood-system-actions">
                                    <div class="blood-system-action-buttons">
                                        <?= $this->Html->link(
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>',
                                            ['action' => 'view', $hospital->hospitalID],
                                            ['class' => 'blood-system-action-button blood-system-view', 'escape' => false, 'title' => 'View Details']
                                        ) ?>
                                        <?= $this->Html->link(
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>',
                                            ['action' => 'edit', $hospital->hospitalID],
                                            ['class' => 'blood-system-action-button blood-system-edit', 'escape' => false, 'title' => 'Edit']
                                        ) ?>
                                        <?= $this->Form->postLink(
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>',
                                            ['action' => 'delete', $hospital->hospitalID],
                                            [
                                                'class' => 'blood-system-action-button blood-system-delete',
                                                'escape' => false,
                                                'confirm' => __('Are you sure you want to delete hospital #{0}?', $hospital->hospitalID),
                                                'title' => 'Delete'
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
                        <?= $this->Paginator->counter(__('Showing {{start}} to {{end}} of {{count}} hospitals')) ?>
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
/* Navbar Styles */
.navbar {
  background-color: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
  padding: 0 20px;
}

.nav-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 70px;
}

.logo-container {
  display: flex;
  align-items: center;
  gap: 12px;
}

.navbar-logo {
  height: 50px;
  width: auto;
  object-fit: contain;
}

.logo {
  font-size: 26px;
  font-weight: 700;
  color: #1e293b;
  text-decoration: none;
}

.nav-menu {
  display: flex;
  list-style: none;
  gap: 15px;
}

.nav-link {
  display: flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
  color: #475569;
  font-weight: 500;
  padding: 10px 15px;
  border-radius: 6px;
  transition: all 0.3s ease;
}

.nav-link i {
  font-size: 16px;
}

.nav-link:hover {
  background-color: #f8fafc;
  color: #dc2626;
}

.donate-btn {
  background-color: #dc2626;
  color: white !important;
}

.donate-btn:hover {
  background-color: #b91c1c;
}

.mobile-menu-btn {
  display: none;
  background: none;
  border: none;
  font-size: 24px;
  color: #1e293b;
  cursor: pointer;
}

/* Responsive Navbar */
@media (max-width: 768px) {
  .nav-menu {
    position: fixed;
    top: 70px;
    left: 0;
    width: 100%;
    background: white;
    flex-direction: column;
    padding: 20px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    transform: translateY(-150%);
    transition: transform 0.3s ease;
  }
  
  .nav-menu.active {
    transform: translateY(0);
  }
  
  .mobile-menu-btn {
    display: block;
  }
}

/* Base Container Styles */
.blood-system-container {
    display: flex;
    min-height: 100vh;
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
    background-color: #f8f9fa;
    padding-top: 70px; /* Added to account for fixed navbar */
}

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
    background: linear-gradient(135deg, #1a659e 0%, #004e89 100%);
    color: white;
    padding: 20px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.blood-system-header-content {
    flex: 1;
    min-width: 200px;
}

.blood-system-title {
    margin: 0;
    font-size: 1.6rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.blood-system-title svg {
    stroke-width: 1.5;
}

.blood-system-subtitle {
    margin: 5px 0 0;
    font-size: 0.9rem;
    opacity: 0.9;
}

/* Button Styles */
.blood-system-button {
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}

.blood-system-button-primary {
    background: linear-gradient(135deg, #ef8354 0%, #ee6c4d 100%);
    color: white;
    box-shadow: 0 2px 10px rgba(239, 131, 84, 0.3);
}

.blood-system-button-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(239, 131, 84, 0.4);
}

/* Table Styles */
.blood-system-table-container {
    padding: 20px;
}

.blood-system-table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.blood-system-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    min-width: 600px;
}

.blood-system-table th {
    background-color: #f1f5f9;
    color: #334155;
    font-weight: 600;
    text-align: left;
    padding: 15px;
    border-bottom: 2px solid #e2e8f0;
    white-space: nowrap;
}

.blood-system-table td {
    padding: 15px;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: middle;
}

.blood-system-table tr:last-child td {
    border-bottom: none;
}

.blood-system-table tr:hover td {
    background-color: #f8fafc;
}

.blood-system-id {
    font-family: 'Courier New', monospace;
    color: #64748b;
    font-weight: 600;
}

/* Icon and Text Styles */
.blood-system-address,
.blood-system-contact {
    display: flex;
    align-items: center;
    gap: 8px;
}

.blood-system-icon {
    flex-shrink: 0;
    color: #94a3b8;
}

/* Action Buttons */
.blood-system-actions {
    width: 150px;
}

.blood-system-action-buttons {
    display: flex;
    gap: 8px;
    justify-content: flex-end;
}

.blood-system-action-button {
    width: 34px;
    height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    transition: all 0.2s;
    color: white;
    text-decoration: none;
}

.blood-system-view {
    background-color: #4cc9f0;
}

.blood-system-edit {
    background-color: #4895ef;
}

.blood-system-delete {
    background-color: #f72585;
}

.blood-system-action-button:hover {
    transform: scale(1.1);
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

/* Pagination Styles */
.blood-system-pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 25px;
    padding: 0 10px;
    flex-wrap: wrap;
    gap: 15px;
}

.blood-system-pagination-info {
    color: #64748b;
    font-size: 0.9rem;
}

.blood-system-pagination-controls {
    display: flex;
    gap: 6px;
    list-style: none;
    padding: 0;
    margin: 0;
    flex-wrap: wrap;
}

.blood-system-pagination-controls li a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    border-radius: 8px;
    background-color: #f1f5f9;
    color: #334155;
    text-decoration: none;
    transition: all 0.2s;
}

.blood-system-pagination-controls li a:hover {
    background-color: #1a659e;
    color: white;
}

.blood-system-pagination-controls li.active a {
    background-color: #1a659e;
    color: white;
    font-weight: bold;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .blood-system-main {
        padding: 15px;
    }
    
    .blood-system-card-header {
        padding: 15px 20px;
    }
    
    .blood-system-table-container {
        padding: 15px;
    }
    
    .blood-system-table th, 
    .blood-system-table td {
        padding: 12px 10px;
    }
    
    .blood-system-pagination {
        flex-direction: column;
        align-items: center;
    }
    
    .blood-system-pagination-info {
        order: 2;
    }
    
    .blood-system-pagination-controls {
        order: 1;
    }
}

@media (max-width: 480px) {
    .blood-system-title {
        font-size: 1.4rem;
    }
    
    .blood-system-button {
        padding: 8px 15px;
        font-size: 0.85rem;
    }
}
</style>

<script>
// Mobile menu toggle
document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
  document.getElementById('navMenu').classList.toggle('active');
});
</script>