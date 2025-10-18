<?php
class M_Admin {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    // Authenticate admin login
    public function authenticateAdmin($username, $password) {
        $this->db->query('SELECT * FROM admins WHERE username = :username');
        $this->db->bind(':username', $username);
        
        $admin = $this->db->single();
        
        if($admin && password_verify($password, $admin->password)) {
            return $admin;
        }
        return false;
    }

    // Update last login
    public function updateLastLogin($admin_id) {
        $this->db->query('UPDATE admins SET last_login = NOW() WHERE id = :id');
        $this->db->bind(':id', $admin_id);
        
        return $this->db->execute();
    }

    // Get all users
    public function getAllUsers() {
        $this->db->query('SELECT u.*, 
            CASE 
                WHEN u.role = "customer" THEN CONCAT(u.first_name, " ", u.last_name)
                WHEN u.role = "stadium_owner" THEN sop.business_name
                WHEN u.role = "coach" THEN CONCAT(u.first_name, " ", u.last_name)
                WHEN u.role = "rental_owner" THEN rop.business_name
            END as display_name
            FROM users u
            LEFT JOIN stadium_owner_profiles sop ON u.id = sop.user_id
            LEFT JOIN rental_owner_profiles rop ON u.id = rop.user_id
            ORDER BY u.created_at DESC');
        
        return $this->db->resultSet();
    }

    // Approve user account
    public function approveUser($user_id) {
        $this->db->query('UPDATE users SET status = "active" WHERE id = :id');
        $this->db->bind(':id', $user_id);
        
        return $this->db->execute();
    }

    // Suspend user account
    public function suspendUser($user_id) {
        $this->db->query('UPDATE users SET status = "suspended" WHERE id = :id');
        $this->db->bind(':id', $user_id);
        
        return $this->db->execute();
    }

    // Delete user account
    public function deleteUser($user_id) {
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $user_id);
        
        return $this->db->execute();
    }

    // Get dashboard statistics
    public function getDashboardStats() {
        $stats = [];
        
        // Total users
        $this->db->query('SELECT COUNT(*) as total FROM users');
        $stats['total_users'] = $this->db->single()->total;
        
        // Pending approvals
        $this->db->query('SELECT COUNT(*) as total FROM users WHERE status = "pending"');
        $stats['pending_approvals'] = $this->db->single()->total;
        
        // Active stadiums
        $this->db->query('SELECT COUNT(*) as total FROM users WHERE role = "stadium_owner" AND status = "active"');
        $stats['active_stadiums'] = $this->db->single()->total;
        
        return $stats;
    }
}