<?php require APPROOT.'/views/admin/inc/header.php'; ?>

<div class="main-content">
    <div class="dashboard-header">
        <h1>User Management</h1>
        <div class="header-actions">
            <button class="btn-add-user" onclick="openAddUserModal()">+ Add New User</button>
        </div>
    </div>

    <!-- User Stats -->
    <div class="user-stats">
        <div class="stat-item">
            <span class="stat-number">320</span>
            <span class="stat-label">Customers</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">45</span>
            <span class="stat-label">Stadium Owners</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">28</span>
            <span class="stat-label">Coaches</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">12</span>
            <span class="stat-label">Rental Owners</span>
        </div>
    </div>

    <!-- Filters -->
    <div class="filters-section">
        <div class="filter-group">
            <select class="filter-select" id="roleFilter">
                <option value="">All Roles</option>
                <option value="customer">Customer</option>
                <option value="stadium_owner">Stadium Owner</option>
                <option value="coach">Coach</option>
                <option value="rental_owner">Rental Owner</option>
            </select>
        </div>
        <div class="filter-group">
            <select class="filter-select" id="statusFilter">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="suspended">Suspended</option>
            </select>
        </div>
        <div class="filter-group">
            <input type="text" class="search-input" placeholder="Search users..." id="userSearch">
        </div>
    </div>

    <!-- Users Table -->
    <div class="dashboard-card">
        <div class="card-header">
            <h3>All Users</h3>
            <span class="total-count">405 total users</span>
        </div>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Joined Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($data['users'])): ?>
                        <?php foreach($data['users'] as $user): ?>
                        <tr>
                            <td>#<?php echo $user['id']; ?></td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar"><?php echo substr($user['name'], 0, 1); ?></div>
                                    <span><?php echo $user['name']; ?></span>
                                </div>
                            </td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <span class="role-badge <?php echo strtolower(str_replace(' ', '-', $user['role'])); ?>">
                                    <?php echo $user['role']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="status-badge <?php echo strtolower($user['status']); ?>">
                                    <?php echo $user['status']; ?>
                                </span>
                            </td>
                            <td>2025-01-15</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action-sm btn-edit" onclick="editUser(<?php echo $user['id']; ?>)">Edit</button>
                                    <button class="btn-action-sm btn-suspend" onclick="suspendUser(<?php echo $user['id']; ?>)">Suspend</button>
                                    <button class="btn-action-sm btn-delete" onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Sample data for demo -->
                        <tr>
                            <td>#001</td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">J</div>
                                    <span>John Doe</span>
                                </div>
                            </td>
                            <td>john@example.com</td>
                            <td><span class="role-badge customer">Customer</span></td>
                            <td><span class="status-badge active">Active</span></td>
                            <td>2025-01-15</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action-sm btn-edit">Edit</button>
                                    <button class="btn-action-sm btn-suspend">Suspend</button>
                                    <button class="btn-action-sm btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#002</td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">S</div>
                                    <span>Stadium Owner 1</span>
                                </div>
                            </td>
                            <td>stadium1@example.com</td>
                            <td><span class="role-badge stadium-owner">Stadium Owner</span></td>
                            <td><span class="status-badge active">Active</span></td>
                            <td>2025-01-12</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action-sm btn-edit">Edit</button>
                                    <button class="btn-action-sm btn-suspend">Suspend</button>
                                    <button class="btn-action-sm btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#003</td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">M</div>
                                    <span>Coach Mike</span>
                                </div>
                            </td>
                            <td>coach.mike@example.com</td>
                            <td><span class="role-badge coach">Coach</span></td>
                            <td><span class="status-badge active">Active</span></td>
                            <td>2025-01-10</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action-sm btn-edit">Edit</button>
                                    <button class="btn-action-sm btn-suspend">Suspend</button>
                                    <button class="btn-action-sm btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div id="addUserModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Add New User</h3>
            <span class="close" onclick="closeAddUserModal()">&times;</span>
        </div>
        <form class="modal-form">
            <div class="form-row">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" required>
                        <option value="">Select Role</option>
                        <option value="customer">Customer</option>
                        <option value="stadium_owner">Stadium Owner</option>
                        <option value="coach">Coach</option>
                        <option value="rental_owner">Rental Owner</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone">
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeAddUserModal()">Cancel</button>
                <button type="submit" class="btn-save">Add User</button>
            </div>
        </form>
    </div>
</div>

<style>
.user-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-item {
    background: rgba(255, 255, 255, 0.05);
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.stat-number {
    display: block;
    font-size: 32px;
    font-weight: 700;
    color: #00ff00;
    margin-bottom: 5px;
}

.stat-label {
    color: #ccc;
    font-size: 14px;
}

.filters-section {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.filter-group {
    min-width: 200px;
}

.filter-select, .search-input {
    width: 100%;
    padding: 12px 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    color: #fff;
    font-size: 14px;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-avatar {
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

.role-badge {
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
}

.role-badge.customer { background: #007bff; color: white; }
.role-badge.stadium-owner { background: #28a745; color: white; }
.role-badge.coach { background: #ffc107; color: #000; }
.role-badge.rental-owner { background: #6f42c1; color: white; }

.status-badge {
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
}

.status-badge.active { background: #28a745; color: white; }
.status-badge.inactive { background: #6c757d; color: white; }
.status-badge.suspended { background: #dc3545; color: white; }

.action-buttons {
    display: flex;
    gap: 8px;
}

.btn-action-sm {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-edit { background: #17a2b8; color: white; }
.btn-suspend { background: #ffc107; color: #000; }
.btn-delete { background: #dc3545; color: white; }

.btn-add-user {
    background: #00ff00;
    color: #000;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

.total-count {
    color: #888;
    font-size: 14px;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.8);
}

.modal-content {
    background: #111;
    margin: 5% auto;
    padding: 0;
    border-radius: 15px;
    width: 90%;
    max-width: 600px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.modal-header {
    padding: 25px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    color: #fff;
    margin: 0;
}

.close {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #fff;
}

.modal-form {
    padding: 25px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    margin-top: 30px;
}

.btn-cancel {
    background: #6c757d;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    cursor: pointer;
}

.btn-save {
    background: #00ff00;
    color: #000;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}
</style>

<script>
function openAddUserModal() {
    document.getElementById('addUserModal').style.display = 'block';
}

function closeAddUserModal() {
    document.getElementById('addUserModal').style.display = 'none';
}

function editUser(id) {
    alert('Edit user #' + id + ' - This will open edit modal');
}

function suspendUser(id) {
    if(confirm('Are you sure you want to suspend this user?')) {
        alert('User #' + id + ' suspended');
    }
}

function deleteUser(id) {
    if(confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
        alert('User #' + id + ' deleted');
    }
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('addUserModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php require APPROOT.'/views/admin/inc/footer.php'; ?>