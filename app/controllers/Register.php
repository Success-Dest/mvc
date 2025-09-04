<?php
class Register extends Controller {
    private $registerModel;

    public function __construct()
    {
        $this->registerModel = $this->model('M_Register');
    }

    public function index() {
        // Default signup page - show role selection
        $data = [
            'title' => 'Join BookMyGround - Choose Your Role',
            'page_type' => 'role_selection'
        ];

        $this->view('signup/v_signup', $data);
    }

    public function customer() {
        // Customer registration form
        $data = [
            'title' => 'Sign Up as Customer - BookMyGround',
            'role' => 'customer',
            'role_title' => 'Sports Player',
            'role_description' => 'Book venues, join sessions, and connect with coaches',
            'error' => '',
            'success' => ''
        ];

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->processRegistration($data, 'customer');
        }

        $this->view('signup/v_customer_signup', $data);
    }

    public function stadium_owner() {
        // Stadium Owner registration form
        $data = [
            'title' => 'Sign Up as Stadium Owner - BookMyGround',
            'role' => 'stadium_owner',
            'role_title' => 'Stadium Owner',
            'role_description' => 'List your facilities and manage bookings efficiently',
            'error' => '',
            'success' => ''
        ];

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->processRegistration($data, 'stadium_owner');
        }

        $this->view('signup/v_stadium_owner_signup', $data);
    }

    public function coach() {
        // Coach registration form
        $data = [
            'title' => 'Sign Up as Coach - BookMyGround',
            'role' => 'coach',
            'role_title' => 'Sports Coach',
            'role_description' => 'Share your expertise and grow your client base',
            'error' => '',
            'success' => ''
        ];

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->processRegistration($data, 'coach');
        }

        $this->view('signup/v_coach_signup', $data);
    }

    public function rental_owner() {
        // Rental Owner registration form
        $data = [
            'title' => 'Sign Up as Equipment Rental Owner - BookMyGround',
            'role' => 'rental_owner',
            'role_title' => 'Equipment Rental Service',
            'role_description' => 'Offer sports gear and expand your rental business',
            'error' => '',
            'success' => ''
        ];

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->processRegistration($data, 'rental_owner');
        }

        $this->view('signup/v_rental_owner_signup', $data);
    }

    private function processRegistration($data, $role) {
        // Get form data
        $formData = [
            'role' => $role,
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'password' => $_POST['password'] ?? '',
            'confirm_password' => $_POST['confirm_password'] ?? '',
            'agree_terms' => isset($_POST['agree_terms'])
        ];

        // Add role-specific fields
        switch($role) {
            case 'customer':
                $formData['date_of_birth'] = $_POST['date_of_birth'] ?? '';
                $formData['gender'] = $_POST['gender'] ?? '';
                $formData['address'] = $_POST['address'] ?? '';
                $formData['city'] = $_POST['city'] ?? '';
                break;

            case 'stadium_owner':
                $formData['business_name'] = $_POST['business_name'] ?? '';
                $formData['business_type'] = $_POST['business_type'] ?? '';
                $formData['business_address'] = $_POST['business_address'] ?? '';
                $formData['city'] = $_POST['city'] ?? '';
                $formData['business_registration'] = $_POST['business_registration'] ?? '';
                break;

            case 'coach':
                $formData['experience_years'] = $_POST['experience_years'] ?? '';
                $formData['specialization'] = $_POST['specialization'] ?? '';
                $formData['certifications'] = $_POST['certifications'] ?? '';
                $formData['coaching_location'] = $_POST['coaching_location'] ?? '';
                $formData['bio'] = $_POST['bio'] ?? '';
                break;

            case 'rental_owner':
                $formData['business_name'] = $_POST['business_name'] ?? '';
                $formData['business_address'] = $_POST['business_address'] ?? '';
                $formData['city'] = $_POST['city'] ?? '';
                $formData['equipment_types'] = $_POST['equipment_types'] ?? [];
                $formData['delivery_available'] = isset($_POST['delivery_available']);
                break;
        }

        // Basic validation
        $validation = $this->validateForm($formData, $role);
        
        if (!empty($validation['errors'])) {
            $data['error'] = implode('<br>', $validation['errors']);
            $data['form_data'] = $formData; // Keep form data to repopulate
            return $data;
        }

        // For now, just show success message
        // Later this will create the actual user account
        $data['success'] = 'Registration form submitted successfully! Account creation will be implemented later.';
        $data['form_data'] = $formData;
        
        return $data;
    }

    private function validateForm($data, $role) {
        $errors = [];

        // Common validations
        if (empty($data['first_name'])) {
            $errors[] = 'First name is required';
        }

        if (empty($data['last_name'])) {
            $errors[] = 'Last name is required';
        }

        if (empty($data['email'])) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address';
        }

        if (empty($data['phone'])) {
            $errors[] = 'Phone number is required';
        }

        if (empty($data['password'])) {
            $errors[] = 'Password is required';
        } elseif (strlen($data['password']) < 6) {
            $errors[] = 'Password must be at least 6 characters long';
        }

        if ($data['password'] !== $data['confirm_password']) {
            $errors[] = 'Passwords do not match';
        }

        if (!$data['agree_terms']) {
            $errors[] = 'You must agree to the terms and conditions';
        }

        // Role-specific validations
        switch($role) {
            case 'customer':
                if (empty($data['date_of_birth'])) {
                    $errors[] = 'Date of birth is required';
                }
                if (empty($data['gender'])) {
                    $errors[] = 'Gender is required';
                }
                break;

            case 'stadium_owner':
                if (empty($data['business_name'])) {
                    $errors[] = 'Business name is required';
                }
                if (empty($data['business_type'])) {
                    $errors[] = 'Business type is required';
                }
                break;

            case 'coach':
                if (empty($data['experience_years'])) {
                    $errors[] = 'Years of experience is required';
                }
                if (empty($data['specialization'])) {
                    $errors[] = 'Specialization is required';
                }
                break;

            case 'rental_owner':
                if (empty($data['business_name'])) {
                    $errors[] = 'Business name is required';
                }
                if (empty($data['equipment_types']) || count($data['equipment_types']) == 0) {
                    $errors[] = 'At least one equipment type is required';
                }
                break;
        }

        return ['errors' => $errors];
    }

    public function success() {
        // Success page after registration
        $data = [
            'title' => 'Registration Successful - BookMyGround'
        ];

        $this->view('signup/v_success', $data);
    }
}