<?php
class M_Register {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    // Check if email already exists
    public function emailExists($email) {
        $this->db->query('SELECT id FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        
        return $this->db->rowCount() > 0;
    }

    // Check if phone number already exists
    public function phoneExists($phone) {
        $this->db->query('SELECT id FROM users WHERE phone = :phone');
        $this->db->bind(':phone', $phone);
        $this->db->execute();
        
        return $this->db->rowCount() > 0;
    }

    // Create a new user account
    public function createUser($userData) {
        $this->db->query('INSERT INTO users (
            first_name, 
            last_name, 
            email, 
            phone, 
            password, 
            role, 
            status, 
            created_at
        ) VALUES (
            :first_name, 
            :last_name, 
            :email, 
            :phone, 
            :password, 
            :role, 
            :status, 
            :created_at
        )');

        // Bind parameters
        $this->db->bind(':first_name', $userData['first_name']);
        $this->db->bind(':last_name', $userData['last_name']);
        $this->db->bind(':email', $userData['email']);
        $this->db->bind(':phone', $userData['phone']);
        $this->db->bind(':password', password_hash($userData['password'], PASSWORD_DEFAULT));
        $this->db->bind(':role', $userData['role']);
        $this->db->bind(':status', 'pending'); // Default status
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        // Execute and return result - FIXED: Return true instead of lastInsertId
        if ($this->db->execute()) {
            // Get the user ID by querying with the email (alternative method)
            $this->db->query('SELECT id FROM users WHERE email = :email ORDER BY id DESC LIMIT 1');
            $this->db->bind(':email', $userData['email']);
            $user = $this->db->single();
            
            return $user ? $user->id : true;
        }
        return false;
    }

    // Create customer profile
    public function createCustomerProfile($userId, $profileData) {
        $this->db->query('INSERT INTO customer_profiles (
            user_id,
            date_of_birth,
            gender,
            address,
            city,
            created_at
        ) VALUES (
            :user_id,
            :date_of_birth,
            :gender,
            :address,
            :city,
            :created_at
        )');

        $this->db->bind(':user_id', $userId);
        $this->db->bind(':date_of_birth', $profileData['date_of_birth']);
        $this->db->bind(':gender', $profileData['gender']);
        $this->db->bind(':address', $profileData['address']);
        $this->db->bind(':city', $profileData['city']);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        return $this->db->execute();
    }

    // Create stadium owner profile
    public function createStadiumOwnerProfile($userId, $profileData) {
        $this->db->query('INSERT INTO stadium_owner_profiles (
            user_id,
            business_name,
            business_type,
            business_address,
            city,
            business_registration,
            created_at
        ) VALUES (
            :user_id,
            :business_name,
            :business_type,
            :business_address,
            :city,
            :business_registration,
            :created_at
        )');

        $this->db->bind(':user_id', $userId);
        $this->db->bind(':business_name', $profileData['business_name']);
        $this->db->bind(':business_type', $profileData['business_type']);
        $this->db->bind(':business_address', $profileData['business_address']);
        $this->db->bind(':city', $profileData['city']);
        $this->db->bind(':business_registration', $profileData['business_registration']);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        return $this->db->execute();
    }

    // Create coach profile
    public function createCoachProfile($userId, $profileData) {
        $this->db->query('INSERT INTO coach_profiles (
            user_id,
            experience_years,
            specialization,
            certifications,
            coaching_location,
            bio,
            created_at
        ) VALUES (
            :user_id,
            :experience_years,
            :specialization,
            :certifications,
            :coaching_location,
            :bio,
            :created_at
        )');

        $this->db->bind(':user_id', $userId);
        $this->db->bind(':experience_years', $profileData['experience_years']);
        $this->db->bind(':specialization', $profileData['specialization']);
        $this->db->bind(':certifications', $profileData['certifications']);
        $this->db->bind(':coaching_location', $profileData['coaching_location']);
        $this->db->bind(':bio', $profileData['bio']);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        return $this->db->execute();
    }

    // Create rental owner profile
    public function createRentalOwnerProfile($userId, $profileData) {
        $this->db->query('INSERT INTO rental_owner_profiles (
            user_id,
            business_name,
            business_address,
            city,
            equipment_types,
            delivery_available,
            created_at
        ) VALUES (
            :user_id,
            :business_name,
            :business_address,
            :city,
            :equipment_types,
            :delivery_available,
            :created_at
        )');

        $this->db->bind(':user_id', $userId);
        $this->db->bind(':business_name', $profileData['business_name']);
        $this->db->bind(':business_address', $profileData['business_address']);
        $this->db->bind(':city', $profileData['city']);
        $this->db->bind(':equipment_types', implode(',', $profileData['equipment_types']));
        $this->db->bind(':delivery_available', $profileData['delivery_available'] ? 1 : 0);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        return $this->db->execute();
    }

    // Get all cities for dropdown
    public function getCities() {
        return [
            'Colombo',
            'Kandy',
            'Galle',
            'Jaffna',
            'Negombo',
            'Anuradhapura',
            'Polonnaruwa',
            'Kurunegala',
            'Ratnapura',
            'Batticaloa',
            'Matara',
            'Vavuniya',
            'Trincomalee',
            'Kalutara',
            'Badulla'
        ];
    }

    // Get sports specializations for coaches
    public function getSportsSpecializations() {
        return [
            'Football' => 'Football',
            'Cricket' => 'Cricket',
            'Basketball' => 'Basketball',
            'Tennis' => 'Tennis',
            'Badminton' => 'Badminton',
            'Swimming' => 'Swimming',
            'Volleyball' => 'Volleyball',
            'Rugby' => 'Rugby',
            'Athletics' => 'Athletics',
            'Hockey' => 'Hockey',
            'Futsal' => 'Futsal',
            'Table Tennis' => 'Table Tennis'
        ];
    }

    // Get equipment types for rental owners
    public function getEquipmentTypes() {
        return [
            'Football Equipment' => 'Football Equipment',
            'Cricket Equipment' => 'Cricket Equipment',
            'Basketball Equipment' => 'Basketball Equipment',
            'Tennis Equipment' => 'Tennis Equipment',
            'Badminton Equipment' => 'Badminton Equipment',
            'Swimming Equipment' => 'Swimming Equipment',
            'Volleyball Equipment' => 'Volleyball Equipment',
            'Rugby Equipment' => 'Rugby Equipment',
            'Athletics Equipment' => 'Athletics Equipment',
            'Hockey Equipment' => 'Hockey Equipment',
            'Futsal Equipment' => 'Futsal Equipment',
            'Table Tennis Equipment' => 'Table Tennis Equipment',
            'Gym Equipment' => 'Gym Equipment',
            'Safety Gear' => 'Safety Gear'
        ];
    }

    // Get business types for stadium owners
    public function getBusinessTypes() {
        return [
            'Private Stadium' => 'Private Stadium',
            'Sports Complex' => 'Sports Complex',
            'Community Center' => 'Community Center',
            'School/University' => 'School/University',
            'Hotel/Resort' => 'Hotel/Resort',
            'Government Facility' => 'Government Facility',
            'Sports Club' => 'Sports Club',
            'Other' => 'Other'
        ];
    }

    // Send welcome email (placeholder)
    public function sendWelcomeEmail($email, $name, $role) {
        // This would integrate with an email service
        // For now, just return true
        return true;
    }

    // Create email verification token
    public function createEmailVerification($userId, $email) {
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+24 hours'));

        $this->db->query('INSERT INTO email_verifications (user_id, email, token, expires_at, created_at) 
                         VALUES (:user_id, :email, :token, :expires_at, :created_at)');
        
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':email', $email);
        $this->db->bind(':token', $token);
        $this->db->bind(':expires_at', $expires);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {
            return $token;
        }
        return false;
    }

    // Get registration statistics
    public function getRegistrationStats() {
        // For demo purposes, return sample data
        return [
            'total_users' => 1250,
            'customers' => 850,
            'stadium_owners' => 180,
            'coaches' => 120,
            'rental_owners' => 100,
            'pending_approvals' => 25,
            'verified_users' => 1100,
            'this_month_registrations' => 85
        ];
    }
}