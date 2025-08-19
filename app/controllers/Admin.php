<?php
class Admin extends Controller {
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('M_Admin');
    }

    public function index() {
        session_start();
        
        // Check if admin is logged in
        if (!isset($_SESSION['admin_logged_in'])) {
            $this->login();
            return;
        }

        // Dashboard data
        $data = [
            'title' => 'Admin Dashboard',
            'total_users' => 1250,
            'total_bookings' => 340,
            'monthly_revenue' => 85000,
            'pending_payouts' => 65000,
            'pending_refunds' => 5,
            'active_stadiums' => 45,
            'recent_bookings' => [
                ['id' => 1, 'stadium' => 'Colombo Cricket Ground', 'customer' => 'John Doe', 'amount' => 5000, 'date' => '2025-08-19'],
                ['id' => 2, 'stadium' => 'Football Arena Pro', 'customer' => 'Jane Smith', 'amount' => 7500, 'date' => '2025-08-18'],
                ['id' => 3, 'stadium' => 'Tennis Academy Courts', 'customer' => 'Mike Wilson', 'amount' => 2500, 'date' => '2025-08-18']
            ],
            'pending_payouts_list' => [
                ['owner' => 'Stadium Owner 1', 'stadium' => 'Colombo Cricket Ground', 'amount' => 4000, 'commission' => 1000],
                ['owner' => 'Stadium Owner 2', 'stadium' => 'Football Arena Pro', 'amount' => 6000, 'commission' => 1500]
            ]
        ];

        $this->view('admin/v_dashboard', $data);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Simple temporary login (username: admin, password: admin123)
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($username === 'admin' && $password === 'admin123') {
                session_start();
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $username;
                header('Location: ' . URLROOT . '/admin');
                exit;
            } else {
                $data['error'] = 'Invalid credentials';
            }
        }

        $data = [
            'title' => 'Admin Login'
        ];

        $this->view('admin/v_login', $data);
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . URLROOT . '/admin/login');
        exit;
    }

    public function users() {
        session_start();
        
        if (!isset($_SESSION['admin_logged_in'])) {
            $this->login();
            return;
        }

        $data = [
            'title' => 'User Management',
            'users' => [
                ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Customer', 'status' => 'Active'],
                ['id' => 2, 'name' => 'Stadium Owner 1', 'email' => 'owner1@example.com', 'role' => 'Stadium Owner', 'status' => 'Active'],
                ['id' => 3, 'name' => 'Coach Mike', 'email' => 'coach@example.com', 'role' => 'Coach', 'status' => 'Active'],
                ['id' => 4, 'name' => 'Rental Owner Alex', 'email' => 'rental@example.com', 'role' => 'Rental Owner', 'status' => 'Active'],
                ['id' => 5, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'Customer', 'status' => 'Inactive']
            ]
        ];

        $this->view('admin/v_users', $data);
    }

    public function bookings() {
        session_start();
        
        if (!isset($_SESSION['admin_logged_in'])) {
            $this->login();
            return;
        }

        $data = [
            'title' => 'Booking Management',
            'bookings' => [
                ['id' => 1, 'stadium' => 'Colombo Cricket Ground', 'customer' => 'John Doe', 'date' => '2025-08-19', 'amount' => 5000, 'status' => 'Completed'],
                ['id' => 2, 'stadium' => 'Football Arena Pro', 'customer' => 'Jane Smith', 'date' => '2025-08-20', 'amount' => 7500, 'status' => 'Pending'],
                ['id' => 3, 'stadium' => 'Tennis Academy Courts', 'customer' => 'Mike Wilson', 'date' => '2025-08-18', 'amount' => 2500, 'status' => 'Completed'],
                ['id' => 4, 'stadium' => 'Basketball Hub', 'customer' => 'Sarah Connor', 'date' => '2025-08-21', 'amount' => 4000, 'status' => 'Pending'],
                ['id' => 5, 'stadium' => 'Multi-Purpose Arena', 'customer' => 'Tom Hardy', 'date' => '2025-08-17', 'amount' => 6000, 'status' => 'Refunded']
            ]
        ];

        $this->view('admin/v_bookings', $data);
    }

    public function content() {
        session_start();
        
        if (!isset($_SESSION['admin_logged_in'])) {
            $this->login();
            return;
        }

        $data = [
            'title' => 'Content Management',
            'hero_title' => 'BOOK YOUR SPORT GROUND',
            'hero_description' => 'Your All-in-One Solution for Finding and Booking Indoor & Outdoor Stadiums, Rent Sport Equipments, Attend Practise Sessions, Book Individual Coaching Sessions & Publish Your Advertisements',
            'hero_bg_image' => 'basketball-player.png'
        ];

        $this->view('admin/v_content', $data);
    }

    public function messages() {
        session_start();
        
        if (!isset($_SESSION['admin_logged_in'])) {
            $this->login();
            return;
        }

        $data = [
            'title' => 'Message Center',
            'messages' => [
                ['id' => 1, 'from' => 'John Doe', 'subject' => 'Booking Cancellation Request', 'date' => '2025-08-19', 'status' => 'Unread'],
                ['id' => 2, 'from' => 'Stadium Owner 1', 'subject' => 'Payout Question', 'date' => '2025-08-18', 'status' => 'Read'],
                ['id' => 3, 'from' => 'Mike Wilson', 'subject' => 'Equipment Rental Issue', 'date' => '2025-08-17', 'status' => 'Priority'],
                ['id' => 4, 'from' => 'Coach Sarah', 'subject' => 'Training Session Schedule', 'date' => '2025-08-16', 'status' => 'Read']
            ]
        ];

        $this->view('admin/v_messages', $data);
    }

    public function payouts() {
        session_start();
        
        if (!isset($_SESSION['admin_logged_in'])) {
            $this->login();
            return;
        }

        $data = [
            'title' => 'Payout Management',
            'pending_payouts' => [
                ['owner' => 'Stadium Owner 1', 'stadium' => 'Colombo Cricket Ground', 'total_bookings' => 12, 'gross_amount' => 60000, 'commission' => 12000, 'net_payout' => 48000],
                ['owner' => 'Stadium Owner 2', 'stadium' => 'Football Arena Pro', 'total_bookings' => 8, 'gross_amount' => 45000, 'commission' => 9000, 'net_payout' => 36000],
                ['owner' => 'Tennis Academy', 'stadium' => 'Tennis Courts', 'total_bookings' => 15, 'gross_amount' => 37500, 'commission' => 7500, 'net_payout' => 30000]
            ],
            'completed_payouts' => [
                ['owner' => 'Basketball Hub', 'amount' => 25000, 'date' => '2025-08-12', 'status' => 'Completed'],
                ['owner' => 'Multi-Purpose Arena', 'amount' => 42000, 'date' => '2025-08-05', 'status' => 'Completed']
            ]
        ];

        $this->view('admin/v_payouts', $data);
    }

    public function refunds() {
        session_start();
        
        if (!isset($_SESSION['admin_logged_in'])) {
            $this->login();
            return;
        }

        $data = [
            'title' => 'Refund Requests',
            'refund_requests' => [
                ['id' => 1, 'booking_id' => 'BK0032', 'customer' => 'John Doe', 'stadium' => 'Tennis Academy Courts', 'amount' => 2500, 'reason' => 'Weather conditions', 'date' => '2025-08-19', 'status' => 'Pending'],
                ['id' => 2, 'booking_id' => 'BK0028', 'customer' => 'Sarah Wilson', 'stadium' => 'Football Arena Pro', 'amount' => 7500, 'reason' => 'Emergency cancellation', 'date' => '2025-08-18', 'status' => 'Pending'],
                ['id' => 3, 'booking_id' => 'BK0025', 'customer' => 'Mike Johnson', 'stadium' => 'Basketball Hub', 'amount' => 4000, 'reason' => 'Double booking error', 'date' => '2025-08-17', 'status' => 'Approved'],
                ['id' => 4, 'booking_id' => 'BK0022', 'customer' => 'Emma Davis', 'stadium' => 'Cricket Ground', 'amount' => 5000, 'reason' => 'Facility unavailable', 'date' => '2025-08-16', 'status' => 'Processed']
            ]
        ];

        $this->view('admin/v_refunds', $data);
    }
}
?>