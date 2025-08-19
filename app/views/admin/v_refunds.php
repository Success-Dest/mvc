<?php require APPROOT.'/views/admin/inc/header.php'; ?>

<div class="main-content">
    <div class="dashboard-header">
        <h1>Refund Requests</h1>
        <div class="header-actions">
            <button class="btn-bulk-approve" onclick="bulkApproveRefunds()">✅ Approve All</button>
        </div>
    </div>

    <!-- Refund Stats -->
    <div class="refund-stats">
        <div class="stat-item">
            <div class="stat-icon">⏳</div>
            <div class="stat-details">
                <span class="stat-number">5</span>
                <span class="stat-label">Pending Requests</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">✅</div>
            <div class="stat-details">
                <span class="stat-number">23</span>
                <span class="stat-label">Approved This Month</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">💰</div>
            <div class="stat-details">
                <span class="stat-number">LKR 45,000</span>
                <span class="stat-label">Total Refund Amount</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">📊</div>
            <div class="stat-details">
                <span class="stat-number">12%</span>
                <span class="stat-label">Refund Rate</span>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="filters-section">
        <div class="filter-group">
            <select class="filter-select" id="statusFilter">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="processed">Processed</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
        <div class="filter-group">
            <select class="filter-select" id="reasonFilter">
                <option value="">All Reasons</option>
                <option value="weather">Weather Conditions</option>
                <option value="emergency">Emergency</option>
                <option value="error">Booking Error</option>
                <option value="facility">Facility Issues</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="filter-group">
            <input type="text" class="search-input" placeholder="Search refunds..." id="refundSearch">
        </div>
    </div>

    <!-- Refund Requests Table -->
    <div class="dashboard-card">
        <div class="card-header">
            <h3>Refund Requests</h3>
            <span class="total-count"><?php echo count($data['refund_requests']); ?> total requests</span>
        </div>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="selectAll" onchange="toggleSelectAll()">
                        </th>
                        <th>Request ID</th>
                        <th>Booking ID</th>
                        <th>Customer</th>
                        <th>Stadium</th>
                        <th>Amount</th>
                        <th>Reason</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['refund_requests'] as $refund): ?>
                    <tr class="refund-row" data-status="<?php echo strtolower($refund['status']); ?>">
                        <td>
                            <?php if($refund['status'] == 'Pending'): ?>
                            <input type="checkbox" class="refund-checkbox" value="<?php echo $refund['id']; ?>">
                            <?php endif; ?>
                        </td>
                        <td>#RF<?php echo str_pad($refund['id'], 3, '0', STR_PAD_LEFT); ?></td>
                        <td>
                            <a href="#" class="booking-link" onclick="viewBookingDetails('<?php echo $refund['booking_id']; ?>')">
                                #<?php echo $refund['booking_id']; ?>
                            </a>
                        </td>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar"><?php echo substr($refund['customer'], 0, 1); ?></div>
                                <span><?php echo $refund['customer']; ?></span>
                            </div>
                        </td>
                        <td><?php echo $refund['stadium']; ?></td>
                        <td>
                            <strong class="refund-amount">LKR <?php echo number_format($refund['amount']); ?></strong>
                        </td>
                        <td>
                            <span class="reason-tag <?php echo strtolower(str_replace(' ', '-', $refund['reason'])); ?>">
                                <?php echo $refund['reason']; ?>
                            </span>
                        </td>
                        <td><?php echo $refund['date']; ?></td>
                        <td>
                            <span class="status-badge <?php echo strtolower($refund['status']); ?>">
                                <?php echo $refund['status']; ?>
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <?php if($refund['status'] == 'Pending'): ?>
                                    <button class="btn-action-sm btn-approve" onclick="approveRefund(<?php echo $refund['id']; ?>, <?php echo $refund['amount']; ?>)">Approve</button>
                                    <button class="btn-action-sm btn-reject" onclick="rejectRefund(<?php echo $refund['id']; ?>)">Reject</button>
                                <?php elseif($refund['status'] == 'Approved'): ?>
                                    <button class="btn-action-sm btn-process" onclick="processRefund(<?php echo $refund['id']; ?>, <?php echo $refund['amount']; ?>)">Process</button>
                                    <button class="btn-action-sm btn-view" onclick="viewRefundDetails(<?php echo $refund['id']; ?>)">View</button>
                                <?php else: ?>
                                    <button class="btn-action-sm btn-view" onclick="viewRefundDetails(<?php echo $refund['id']; ?>)">View</button>
                                    <button class="btn-action-sm btn-receipt" onclick="downloadReceipt(<?php echo $refund['id']; ?>)">Receipt</button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Refund Activity -->
    <div class="dashboard-card">
        <div class="card-header">
            <h3>Recent Refund Activity</h3>
        </div>
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon approved">✅</div>
                <div class="activity-details">
                    <p><strong>Refund #RF004</strong> approved for Mike Johnson</p>
                    <small>Basketball Hub booking - LKR 4,000</small>
                    <small>2 hours ago</small>
                </div>
                <div class="activity-amount approved">+LKR 4,000</div>
            </div>
            <div class="activity-item">
                <div class="activity-icon processed">💰</div>
                <div class="activity-details">
                    <p><strong>Refund #RF003</strong> processed successfully</p>
                    <small>Emma Davis - Cricket Ground booking</small>
                    <small>5 hours ago</small>
                </div>
                <div class="activity-amount processed">LKR 5,000</div>
            </div>
            <div class="activity-item">
                <div class="activity-icon pending">⏳</div>
                <div class="activity-details">
                    <p><strong>New refund request #RF005</strong> received</p>
                    <small>Sarah Wilson - Football Arena Pro</small>
                    <small>1 day ago</small>
                </div>
                <div class="activity-amount pending">LKR 7,500</div>
            </div>
        </div>
    </div>
</div>

<!-- Refund Details Modal -->
<div id="refundModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Refund Request Details</h3>
            <span class="close" onclick="closeRefundModal()">&times;</span>
        </div>
        <div class="modal-body">
            <div class="refund-details">
                <div class="detail-row">
                    <label>Request ID:</label>
                    <span>#RF001</span>
                </div>
                <div class="detail-row">
                    <label>Booking ID:</label>
                    <span>#BK0032</span>
                </div>
                <div class="detail-row">
                    <label>Customer:</label>
                    <span>John Doe (john@example.com)</span>
                </div>
                <div class="detail-row">
                    <label>Stadium:</label>
                    <span>Tennis Academy Courts</span>
                </div>
                <div class="detail-row">
                    <label>Original Booking Date:</label>
                    <span>2025-08-25, 2:00 PM - 4:00 PM</span>
                </div>
                <div class="detail-row">
                    <label>Refund Amount:</label>
                    <span class="highlight">LKR 2,500</span>
                </div>
                <div class="detail-row">
                    <label>Reason:</label>
                    <span>Weather conditions</span>
                </div>
                <div class="detail-row">
                    <label>Customer Message:</label>
                    <span class="customer-message">"Due to heavy rain forecast, I won't be able to use the tennis court. Please process my refund."</span>
                </div>
                <div class="detail-row">
                    <label>Request Date:</label>
                    <span>2025-08-19</span>
                </div>
                <div class="detail-row">
                    <label>Policy Compliance:</label>
                    <span class="policy-status valid">✅ Eligible for full refund</span>
                </div>
            </div>
        </div>
        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeRefundModal()">Close</button>
            <button class="btn-approve-modal" onclick="approveFromModal()">Approve Refund</button>
        </div>
    </div>
</div>

<!-- Bulk Action Modal -->
<div id="bulkActionModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Bulk Approve Refunds</h3>
            <span class="close" onclick="closeBulkModal()">&times;</span>
        </div>
        <div class="modal-body">
            <p>You are about to approve <span id="bulkCount">0</span> refund requests totaling <span id="bulkAmount">LKR 0</span>.</p>
            <div class="bulk-list" id="bulkList">
                <!-- Selected refunds will be listed here -->
            </div>
            <p><strong>Are you sure you want to proceed?</strong></p>
        </div>
        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeBulkModal()">Cancel</button>
            <button class="btn-bulk-confirm" onclick="confirmBulkApproval()">Approve All</button>
        </div>
    </div>
</div>

<style>
.refund-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.customer-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.customer-avatar {
    width: 35px;
    height: 35px;
    background: #00ff00;
    color: #000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 14px;
}

.refund-amount {
    color: #dc3545;
    font-size: 16px;
}

.reason-tag {
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
}

.reason-tag.weather-conditions { background: #17a2b8; color: white; }
.reason-tag.emergency-cancellation { background: #dc3545; color: white; }
.reason-tag.double-booking-error { background: #ffc107; color: #000; }
.reason-tag.facility-unavailable { background: #6f42c1; color: white; }

.booking-link {
    color: #00ff00;
    text-decoration: none;
    font-weight: 600;
}

.booking-link:hover {
    text-decoration: underline;
}

.btn-bulk-approve {
    background: #28a745;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

.btn-approve {
    background: #28a745;
    color: white;
}

.btn-reject {
    background: #dc3545;
    color: white;
}

.btn-process {
    background: #17a2b8;
    color: white;
}

.refund-checkbox,
#selectAll {
    width: 16px;
    height: 16px;
    cursor: pointer;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.activity-icon.approved {
    background: rgba(40, 167, 69, 0.2);
}

.activity-icon.processed {
    background: rgba(23, 162, 184, 0.2);
}

.activity-icon.pending {
    background: rgba(255, 193, 7, 0.2);
}

.activity-details {
    flex: 1;
}

.activity-details p {
    color: #fff;
    margin: 0 0 5px 0;
    font-size: 14px;
}

.activity-details small {
    display: block;
    color: #888;
    font-size: 12px;
    margin-bottom: 2px;
}

.activity-amount {
    font-weight: 600;
    font-size: 14px;
}

.activity-amount.approved {
    color: #28a745;
}

.activity-amount.processed {
    color: #17a2b8;
}

.activity-amount.pending {
    color: #ffc107;
}

.refund-details {
    padding: 20px 0;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 12px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-row label {
    color: #ccc;
    font-weight: 500;
    min-width: 150px;
}

.detail-row span {
    color: #fff;
    font-weight: 500;
    flex: 1;
    text-align: right;
}

.detail-row span.highlight {
    color: #dc3545;
    font-weight: 700;
    font-size: 18px;
}

.customer-message {
    font-style: italic;
    background: rgba(255, 255, 255, 0.1);
    padding: 10px;
    border-radius: 6px;
    margin-top: 5px;
}

.policy-status.valid {
    color: #28a745;
}

.policy-status.invalid {
    color: #dc3545;
}

.btn-approve-modal {
    background: #28a745;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

.bulk-list {
    background: rgba(0, 0, 0, 0.3);
    border-radius: 8px;
    padding: 15px;
    margin: 15px 0;
    max-height: 200px;
    overflow-y: auto;
}

.bulk-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.bulk-item:last-child {
    border-bottom: none;
}

.btn-bulk-confirm {
    background: #28a745;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

@media (max-width: 768px) {
    .refund-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .filters-section {
        flex-direction: column;
    }
    
    .detail-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
    
    .detail-row span {
        text-align: left;
    }
    
    .activity-item {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }
}
</style>

<script>
function toggleSelectAll() {
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.refund-checkbox');
    
    checkboxes.forEach(checkbox => {
        checkbox.checked = selectAll.checked;
    });
}

function approveRefund(id, amount) {
    if(confirm(`Are you sure you want to approve refund #RF${id.toString().padStart(3, '0')} for LKR ${amount.toLocaleString()}?`)) {
        alert(`Refund #RF${id.toString().padStart(3, '0')} approved successfully!`);
        // Here you would make an AJAX call to approve the refund
    }
}

function rejectRefund(id) {
    const reason = prompt('Please provide a reason for rejection:');
    if(reason) {
        alert(`Refund #RF${id.toString().padStart(3, '0')} rejected. Reason: ${reason}`);
        // Here you would make an AJAX call to reject the refund
    }
}

function processRefund(id, amount) {
    if(confirm(`Are you sure you want to process refund payment of LKR ${amount.toLocaleString()}?`)) {
        alert(`Refund payment of LKR ${amount.toLocaleString()} processed successfully!`);
        // Here you would make an AJAX call to process the refund payment
    }
}

function viewRefundDetails(id) {
    document.getElementById('refundModal').style.display = 'block';
}

function closeRefundModal() {
    document.getElementById('refundModal').style.display = 'none';
}

function viewBookingDetails(bookingId) {
    alert(`Viewing details for booking ${bookingId}`);
    // Here you would redirect to booking details or open a modal
}

function downloadReceipt(id) {
    alert(`Downloading refund receipt for #RF${id.toString().padStart(3, '0')}`);
    // Here you would generate and download the receipt
}

function bulkApproveRefunds() {
    const checkedBoxes = document.querySelectorAll('.refund-checkbox:checked');
    if(checkedBoxes.length === 0) {
        alert('Please select at least one refund request to approve.');
        return;
    }
    
    let totalAmount = 0;
    const bulkList = document.getElementById('bulkList');
    bulkList.innerHTML = '';
    
    checkedBoxes.forEach(checkbox => {
        const row = checkbox.closest('tr');
        const amount = parseInt(row.querySelector('.refund-amount').textContent.replace(/[^\d]/g, ''));
        totalAmount += amount;
        
        const item = document.createElement('div');
        item.className = 'bulk-item';
        item.innerHTML = `
            <span>RF${checkbox.value.padStart(3, '0')}</span>
            <span>LKR ${amount.toLocaleString()}</span>
        `;
        bulkList.appendChild(item);
    });
    
    document.getElementById('bulkCount').textContent = checkedBoxes.length;
    document.getElementById('bulkAmount').textContent = `LKR ${totalAmount.toLocaleString()}`;
    document.getElementById('bulkActionModal').style.display = 'block';
}

function closeBulkModal() {
    document.getElementById('bulkActionModal').style.display = 'none';
}

function confirmBulkApproval() {
    alert('All selected refunds approved successfully!');
    closeBulkModal();
    // Here you would make an AJAX call to approve all selected refunds
}

function approveFromModal() {
    alert('Refund approved successfully!');
    closeRefundModal();
}

// Filter functionality
document.getElementById('statusFilter').addEventListener('change', function() {
    const status = this.value.toLowerCase();
    const rows = document.querySelectorAll('.refund-row');
    
    rows.forEach(row => {
        if(status === '' || row.dataset.status === status) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Close modals when clicking outside
window.onclick = function(event) {
    const refundModal = document.getElementById('refundModal');
    const bulkModal = document.getElementById('bulkActionModal');
    
    if (event.target == refundModal) {
        refundModal.style.display = "none";
    }
    if (event.target == bulkModal) {
        bulkModal.style.display = "none";
    }
}
</script>

<?php require APPROOT.'/views/admin/inc/footer.php'; ?>