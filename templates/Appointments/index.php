<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Appointment> $appointments
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

<div class="appointments index content">
    <div class="header-container">
        <h3><?= __('Appointments') ?></h3>
        <?= $this->Html->link(__('<i class="fas fa-plus"></i> New Appointment'), ['action' => 'add'], 
            ['class' => 'button btn-primary float-right', 'escape' => false]) ?>
    </div>
    
    <div class="table-card">
        <div class="table-responsive">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('appointmentID', 'ID') ?></th>
                        <th><?= $this->Paginator->sort('donorName', 'Donor') ?></th>
                        <th><?= $this->Paginator->sort('nric', 'NRIC') ?></th>
                        <th><?= $this->Paginator->sort('phoneNumber', 'Phone') ?></th>
                        <th><?= $this->Paginator->sort('gender') ?></th>
                        <th><?= $this->Paginator->sort('age') ?></th>
                        <th><?= $this->Paginator->sort('hospitalName', 'Hospital') ?></th>
                        <th><?= $this->Paginator->sort('dateTime', 'Date & Time') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?= $this->Number->format($appointment->appointmentID) ?></td>
                        <td><?= h($appointment->donorName) ?></td>
                        <td><?= h($appointment->nric) ?></td>
                        <td><?= h($appointment->phoneNumber) ?></td>
                        <td><?= h($appointment->gender) ?></td>
                        <td><?= h($appointment->age) ?></td>
                        <td><?= h($appointment->hospitalName) ?></td>
                        <td>
                            <span class="date-badge">
                                <?= date('d M Y', strtotime($appointment->dateTime)) ?>
                                <span class="time"><?= date('h:i A', strtotime($appointment->dateTime)) ?></span>
                            </span>
                        </td>
                        <td class="actions">
                            <div class="action-buttons">
                                <?= $this->Html->link(__('<i class="fas fa-eye"></i>'), 
                                    ['action' => 'view', $appointment->appointmentID], 
                                    ['class' => 'btn-view', 'title' => 'View', 'escape' => false]) ?>
                                
                                <?= $this->Html->link(__('<i class="fas fa-edit"></i>'), 
                                    ['action' => 'edit', $appointment->appointmentID], 
                                    ['class' => 'btn-edit', 'title' => 'Edit', 'escape' => false]) ?>
                                
                                <?= $this->Form->postLink(__('<i class="fas fa-trash-alt"></i>'), 
                                    ['action' => 'delete', $appointment->appointmentID], 
                                    ['class' => 'btn-delete', 'title' => 'Delete', 
                                     'confirm' => __('Are you sure you want to delete appointment #{0}?', $appointment->appointmentID),
                                     'escape' => false]) ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="paginator">
        <div class="pagination-info">
            <?= $this->Paginator->counter(__('Showing {{start}} to {{end}} of {{count}} entries')) ?>
        </div>
        <ul class="pagination">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers(['modulus' => 2]) ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
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

/* Enhanced Appointments Table Styles */
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

.appointments.index.content {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
    padding-top: 90px; /* Added to account for fixed navbar */
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px solid var(--medium-gray);
}

.header-container h3 {
    margin: 0;
    color: var(--secondary-color);
    font-size: 24px;
    font-weight: 600;
}

.button {
    display: inline-flex;
    align-items: center;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.button i {
    margin-right: 8px;
}

.btn-primary {
    background-color: var(--primary-color);
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: #c0392b;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.table-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    margin-bottom: 30px;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.styled-table thead tr {
    background-color: var(--secondary-color);
    color: white;
}

.styled-table th {
    padding: 15px;
    text-align: left;
    font-weight: 500;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 0.5px;
}

.styled-table th a {
    color: white;
    text-decoration: none;
}

.styled-table th a:hover {
    text-decoration: underline;
}

.styled-table tbody tr {
    border-bottom: 1px solid var(--medium-gray);
    transition: background-color 0.2s ease;
}

.styled-table tbody tr:nth-child(even) {
    background-color: var(--light-gray);
}

.styled-table tbody tr:hover {
    background-color: rgba(231, 76, 60, 0.05);
}

.styled-table td {
    padding: 15px;
    vertical-align: middle;
}

.date-badge {
    display: inline-flex;
    flex-direction: column;
    background: rgba(52, 152, 219, 0.1);
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 13px;
    line-height: 1.3;
}

.date-badge .time {
    font-weight: 600;
    color: var(--secondary-color);
}

.action-buttons {
    display: flex;
    gap: 8px;
}

.action-buttons a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-view {
    color: var(--accent-color);
    background: rgba(52, 152, 219, 0.1);
}

.btn-view:hover {
    background: rgba(52, 152, 219, 0.2);
    transform: translateY(-2px);
}

.btn-edit {
    color: var(--warning-color);
    background: rgba(243, 156, 18, 0.1);
}

.btn-edit:hover {
    background: rgba(243, 156, 18, 0.2);
    transform: translateY(-2px);
}

.btn-delete {
    color: var(--danger-color);
    background: rgba(231, 76, 60, 0.1);
}

.btn-delete:hover {
    background: rgba(231, 76, 60, 0.2);
    transform: translateY(-2px);
}

.paginator {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

.pagination-info {
    margin-bottom: 15px;
    color: var(--dark-gray);
    font-size: 14px;
}

.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: white;
    color: var(--secondary-color);
    text-decoration: none;
    border: 1px solid var(--medium-gray);
    transition: all 0.2s ease;
}

.pagination a:hover {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

.pagination .active a {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
    font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .table-responsive {
        overflow-x: auto;
    }
    
    .styled-table {
        min-width: 900px;
    }
}

@media (max-width: 768px) {
    .appointments.index.content {
        padding-top: 80px;
    }
}

@media (max-width: 576px) {
    .header-container {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .button {
        margin-top: 15px;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 5px;
    }
}
</style>

<script>
// Mobile menu toggle
document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
  document.getElementById('navMenu').classList.toggle('active');
});
</script>