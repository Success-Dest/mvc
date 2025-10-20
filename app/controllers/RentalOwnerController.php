<?php
class RentalOwnerController extends Controller {
    public function index() {
        $data = [
            'title' => 'Rental Owner Dashboard',
        ];
        $this->view('rentalowner/v_dashboard', $data);
    }
    
    public function shopManagement() {
        // Updated shop data for rental service shops (sports equipment rental)
        $shops = [
            (object)[
                'id' => 1,
                'shop_name' => 'Pro Sports Gear Rentals',
                'address' => '123 Galle Road, Colombo 03',
                'description' => 'Complete sports equipment rental service with premium quality gear for all sports including cricket, football, and tennis.',
                'number_of_fields' => 0, // Not applicable for rental shops
                'hourly_rate' => 0, // Not applicable - using daily rates instead
                'daily_rate' => 1500,
                'contact_email' => 'rentals@prosportsgear.lk',
                'contact_phone' => '+94 71 234 5678',
                'operating_hours' => 'Mon-Sun: 8:00 AM - 8:00 PM',
                'image' => URLROOT . '/public/images/rentaldash/equ1.jpg',
                'status' => 'active',
                'equipment_count' => 85,
                'rentals_count' => 120,
                'category' => 'Multi-Sport',
                'equipment_types' => ['Cricket', 'Football', 'Tennis', 'Basketball'],
                'features' => ['Home Delivery', 'Quality Guarantee', 'Online Booking']
            ],
            (object)[
                'id' => 2,
                'shop_name' => 'Cricket Zone Equipment',
                'address' => '456 Duplication Road, Colombo 07',
                'description' => 'Specialized cricket equipment rental with professional grade gear including bats, pads, gloves, and protective equipment.',
                'number_of_fields' => 0,
                'hourly_rate' => 0,
                'daily_rate' => 800,
                'contact_email' => 'info@cricketzone.lk',
                'contact_phone' => '+94 77 345 6789',
                'operating_hours' => 'Mon-Sat: 9:00 AM - 7:00 PM',
                'image' => URLROOT . '/public/images/rentaldash/equ1.jpg',
                'status' => 'active',
                'equipment_count' => 45,
                'rentals_count' => 65,
                'category' => 'Cricket',
                'equipment_types' => ['Cricket'],
                'features' => ['Expert Advice', 'Equipment Maintenance', 'Bulk Discounts']
            ],
            (object)[
                'id' => 3,
                'shop_name' => 'Football Gear Hub',
                'address' => '789 Galle Road, Dehiwala',
                'description' => 'Premium football equipment rental for players and teams including balls, shoes, goalkeeper gear, and training equipment.',
                'number_of_fields' => 0,
                'hourly_rate' => 0,
                'daily_rate' => 1200,
                'contact_email' => 'hello@footballgearhub.lk',
                'contact_phone' => '+94 70 456 7890',
                'operating_hours' => 'Mon-Sun: 7:00 AM - 9:00 PM',
                'image' => URLROOT . '/public/images/rentaldash/equ1.jpg',
                'status' => 'active',
                'equipment_count' => 60,
                'rentals_count' => 95,
                'category' => 'Football',
                'equipment_types' => ['Football'],
                'features' => ['Team Packages', 'Goalkeeper Gear', 'Size Fitting']
            ],

        ];

        $data = [
            'title' => 'Shop Management',
            'shops' => $shops
        ];
        $this->view('rentalowner/shop_managment', $data);
    }

    public function editShop($shop_id = null) {
        // Updated sample shop data for editing rental service shops
        $sampleShops = [
            1 => (object)[
                'id' => 1,
                'shop_name' => 'Pro Sports Gear Rentals',
                'address' => '123 Galle Road, Colombo 03',
                'description' => 'Complete sports equipment rental service with premium quality gear for all sports including cricket, football, and tennis.',
                'equipment_count' => 85,
                'daily_rate' => 1500,
                'contact_email' => 'rentals@prosportsgear.lk',
                'contact_phone' => '+94 71 234 5678',
                'operating_hours' => 'Mon-Sun: 8:00 AM - 8:00 PM',
                'category' => 'Multi-Sport'
            ],
            2 => (object)[
                'id' => 2,
                'shop_name' => 'Cricket Zone Equipment',
                'address' => '456 Duplication Road, Colombo 07',
                'description' => 'Specialized cricket equipment rental with professional grade gear including bats, pads, gloves, and protective equipment.',
                'equipment_count' => 45,
                'daily_rate' => 800,
                'contact_email' => 'info@cricketzone.lk',
                'contact_phone' => '+94 77 345 6789',
                'operating_hours' => 'Mon-Sat: 9:00 AM - 7:00 PM',
                'category' => 'Cricket'
            ],
            3 => (object)[
                'id' => 3,
                'shop_name' => 'Football Gear Hub',
                'address' => '789 Galle Road, Dehiwala',
                'description' => 'Premium football equipment rental for players and teams including balls, shoes, goalkeeper gear, and training equipment.',
                'equipment_count' => 60,
                'daily_rate' => 1200,
                'contact_email' => 'hello@footballgearhub.lk',
                'contact_phone' => '+94 70 456 7890',
                'operating_hours' => 'Mon-Sun: 7:00 AM - 9:00 PM',
                'category' => 'Football'
            ],
            4 => (object)[
                'id' => 4,
                'shop_name' => 'Tennis Pro Rentals',
                'address' => '321 Hotel Road, Mount Lavinia',
                'description' => 'High-quality tennis equipment rental with expert guidance including rackets, balls, nets, and court equipment.',
                'equipment_count' => 35,
                'daily_rate' => 1000,
                'contact_email' => 'rentals@tennispro.lk',
                'contact_phone' => '+94 76 567 8901',
                'operating_hours' => 'Tue-Sun: 8:00 AM - 6:00 PM',
                'category' => 'Tennis'
            ]
        ];

        // If no shop_id is provided, redirect back
        if (!$shop_id) {
            header('Location: ' . URLROOT . '/rentalowner/shopManagement');
            exit;
        }

        // Check if shop exists
        if (!isset($sampleShops[$shop_id])) {
            header('Location: ' . URLROOT . '/rentalowner/shopManagement');
            exit;
        }

        $shop = $sampleShops[$shop_id];

        $data = [
            'title' => 'Edit Shop - ' . $shop->shop_name,
            'shop' => $shop
        ];
        
        $this->view('rentalowner/edit_shop', $data);
    }

    public function addShop() {
        $data = [
            'title' => 'Add New Shop'
        ];
        $this->view('rentalowner/add_shop', $data);
    }

    public function messages(){
        $data = [
            'title' => 'Messages',
        ];
        $this->view('rentalowner/v_messages', $data);
    }

    public function advertisment(){
        $data = [
            'title' => 'Advertisement Management',
            'monthly_revenue' => 47000,
            'pending_ads' => [
                [
                    'id' => 1, 
                    'business' => 'Sports Gear Rentals', 
                    'service_type' => 'Equipment Rental',
                    'contact' => 'John Silva', 
                    'email' => 'john@sportgear.lk', 
                    'phone' => '0712345678', 
                    'amount' => 15000, 
                    'status' => 'Payment Pending', 
                    'submitted' => '2025-08-19'
                ],
                [
                    'id' => 2, 
                    'business' => 'Sports Gear Rentals', 
                    'service_type' => 'Equipment Rental',
                    'contact' => 'kalana Silva', 
                    'email' => 'kalana@sportgear.lk', 
                    'phone' => '0772345678', 
                    'amount' => 45000, 
                    'status' => 'Under Review', 
                    'submitted' => '2025-08-19'
                ]
            ],
            'verified_ads' => [
                [
                    'id' => 4, 
                    'business' => 'City Sports Arena',
                    'service_type' => 'Facility Rental',
                    'contact' => 'Maria Fernando',
                    'email' => 'maria@citysports.lk',
                    'phone' => '0754321098', 
                    'amount' => 25000, 
                    'status' => 'Verified', 
                    'submitted' => '2025-08-16',
                    'verified_date' => '2025-08-20'
                ]
            ],
            'published_ads' => [
                [
                    'id' => 5, 
                    'business' => 'Premium Ground Rentals', 
                    'service_type' => 'Venue Rental',
                    'type' => 'Image', 
                    'image' => 'rental-ad1.jpg',
                    'published' => '2025-08-15', 
                    'expires' => '2025-09-15', 
                    'status' => 'Active'
                ]
            ]
        ];
        $this->view('rentalowner/v_advertisment', $data);
    }

    public function blog() {
        $data = [
            'title' => 'Blog Management',
            'posts' => [
                ['id' => 1, 'title' => 'Beginner\'s Guide: What to Rent for Your First Cricket Match', 'author' => 'Krishna Wishvajith', 'category' => 'Cricket', 'status' => 'Published', 'published' => '2025-08-18', 'views' => 1250],
                ['id' => 2, 'title' => 'How to Choose the Right Football for Different Grounds', 'author' => 'Krishna Wishvajith', 'category' => 'Football', 'status' => 'Draft', 'published' => '', 'views' => 0],
            ]
        ];
        $this->view('rentalowner/v_blog', $data);
    }
}