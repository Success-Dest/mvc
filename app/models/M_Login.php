<?php
class M_Login {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    // Find user by email
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        
        $row = $this->db->single();
        
        if($this->db->rowCount() > 0) {
            return $row;
        }
        return false;
    }

    // Verify user login credentials
    public function login($email, $password) {
        $user = $this->findUserByEmail($email);
        
        if($user) {
            // Verify password
            if(password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }

    // Check if email exists
    public function emailExists($email) {
        $this->db->query('SELECT id FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        
        return $this->db->rowCount() > 0;
    }

    // Create password reset token
    public function createPasswordResetToken($email) {
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $this->db->query('UPDATE users SET 
            reset_password_token = :token,
            reset_password_expires = :expires
            WHERE email = :email');
        
        $this->db->bind(':token', $token);
        $this->db->bind(':expires', $expires);
        $this->db->bind(':email', $email);
        
        if($this->db->execute()) {
            return $token;
        }
        return false;
    }

    // Log user activity
    public function logActivity($user_id, $activity) {
        // Optional: Create activity log table if needed
        return true;
    }

    // Get login attempts for security
    public function getLoginAttempts($email) {
        $this->db->query('SELECT COUNT(*) as attempts 
            FROM login_attempts 
            WHERE email = :email 
            AND attempted_at > DATE_SUB(NOW(), INTERVAL 15 MINUTE)');
        
        $this->db->bind(':email', $email);
        $result = $this->db->single();
        
        return $result ? $result->attempts : 0;
    }

    // Record failed login attempt
    public function recordLoginAttempt($email, $ip_address) {
        $this->db->query('INSERT INTO login_attempts (email, ip_address, attempted_at) 
            VALUES (:email, :ip, NOW())');
        
        $this->db->bind(':email', $email);
        $this->db->bind(':ip', $ip_address);
        
        return $this->db->execute();
    }

    // Clear login attempts after successful login
    public function clearLoginAttempts($email) {
        $this->db->query('DELETE FROM login_attempts WHERE email = :email');
        $this->db->bind(':email', $email);
        
        return $this->db->execute();
    }

    // Update last login time
    public function updateLastLogin($user_id) {
        $this->db->query('UPDATE users SET last_login = NOW() WHERE id = :id');
        $this->db->bind(':id', $user_id);
        
        return $this->db->execute();
    }
}