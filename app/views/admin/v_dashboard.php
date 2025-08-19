<?php require APPROOT.'/views/admin/inc/header.php'; ?>

<div class="main-content">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1>Dashboard Overview</h1>
        <div class="date-range">
            <span>📅 <?php echo date('F j, Y'); ?></span>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-info">
                <h3><?php echo number_format($data['total_users']); ?></h3>
                <p>Total Users</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">📅</div>
            <div class="stat-info">
                <h3><?php echo number_format($data['total_bookings']); ?></h3>
                <p>Total Bookings</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">💰</div>
            <div class="stat-info">
                <h3>LKR <?php echo number_format($data['monthly_revenue']); ?></h3>
                <p>Monthly Revenue</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">🏟️</div>
            <div class="stat-info">
                <h3><?php echo number_format($data['active_stadiums']); ?></h3>
                <p>Active Stadiums</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Content Grid -->
    <div class="dashboard-grid">
        <!-- Recent Bookings -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3>Recent Bookings</h3>
                <a href="<?php echo URLROOT; ?>/admin/bookings" class="view-all">View All →</a>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Stadium</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['recent_bookings'] as $booking): ?>
                        <tr>
                            <td>#<?php echo $booking['id']; ?></td>
                            <td><?php echo $booking['stadium']; ?></td>
                            <td><?php echo $booking['customer']; ?></td>
                            <td>LKR <?php echo number_format($booking['amount']); ?></td>
                            <td><?php echo $booking['date']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pending Payouts -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3>Pending Payouts</h3>
                <span class="badge">LKR <?php echo number_format($data['pending_payouts']); ?></span>
            </div>
            <div class="payout-list">
                <?php foreach($data['pending_payouts_list'] as $payout): ?>
                <div class="payout-item">
                    <div class="payout-info">
                        <h4><?php echo $payout['owner']; ?></h4>
                        <p><?php echo $payout['stadium']; ?></p>
                    </div>
                    <div class="payout-amount">
                        <span class="amount">LKR <?php echo number_format($payout['amount']); ?></span>
                        <span class="commission">Commission: LKR <?php echo number_format($payout['commission']); ?></span>
                    </div>
                    <button class="btn-payout">Release</button>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3>Quick Actions</h3>
            </div>
            <div class="quick-actions">
                <div class="action-item">
                    <span class="action-icon">🔔</span>
                    <div class="action-info">
                        <h4>Refund Requests</h4>
                        <p><?php echo $data['pending_refunds']; ?> pending requests</p>
                    </div>
                    <button class="btn-action">Review</button>
                </div>
                
                <div class="action-item">
                    <span class="action-icon">💬</span>
                    <div class="action-info">
                        <h4>Messages</h4>
                        <p>3 unread messages</p>
                    </div>
                    <a href="<?php echo URLROOT; ?>/admin/messages" class="btn-action">View</a>
                </div>
                
                <div class="action-item">
                    <span class="action-icon">⚙️</span>
                    <div class="action-info">
                        <h4>Content Management</h4>
                        <p>Update website content</p>
                    </div>
                    <a href="<?php echo URLROOT; ?>/admin/content" class="btn-action">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT.'/views/admin/inc/footer.php'; ?>