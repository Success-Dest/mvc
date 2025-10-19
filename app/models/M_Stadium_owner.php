<?php
class M_Stadium_owner {
    private $db;

    public function __construct(){
        try {
            $this->db = new Database();
        } catch (Exception $e) {
            error_log('Database connection error in M_Stadium_owner: ' . $e->getMessage());
        }
    }

    // Get stadium owner dashboard stats
    public function getOwnerStats($owner_id) {
        try {
            if (!$this->db) {
                return $this->getDefaultStats();
            }

            // Return sample data for demo
            return [
                'total_properties' => 3,
                'active_bookings' => 8,
                'monthly_revenue' => 45000,
                'total_customers' => 24,
                'occupancy_rate' => 75,
                'average_rating' => 4.6
            ];

        } catch (Exception $e) {
            error_log('Error in getOwnerStats: ' . $e->getMessage());
            return $this->getDefaultStats();
        }
    }

    private function getDefaultStats() {
        return [
            'total_properties' => 0,
            'active_bookings' => 0,
            'monthly_revenue' => 0,
            'total_customers' => 0,
            'occupancy_rate' => 0,
            'average_rating' => 0.0
        ];
    }

    // Get recent bookings for owner
    public function getRecentBookings($owner_id, $limit = 5) {
        try {
            // Return sample data
            return [
                [
                    'id' => 'BK001',
                    'customer' => 'Krishna Wishvajith',
                    'property' => 'Colombo Cricket Ground',
                    'date' => '2025-01-25',
                    'time' => '2:00 PM - 4:00 PM',
                    'amount' => 5000,
                    'status' => 'Confirmed',
                    'payment_status' => 'Paid'
                ],
                [
                    'id' => 'BK002',
                    'customer' => 'Kulakshi Thathsarani',
                    'property' => 'Football Arena Pro',
                    'date' => '2025-01-26',
                    'time' => '6:00 PM - 8:00 PM',
                    'amount' => 7500,
                    'status' => 'Pending',
                    'payment_status' => 'Pending'
                ],
                [
                    'id' => 'BK003',
                    'customer' => 'Dinesh Sulakshana',
                    'property' => 'Tennis Academy Courts',
                    'date' => '2025-01-24',
                    'time' => '4:00 PM - 6:00 PM',
                    'amount' => 2500,
                    'status' => 'Completed',
                    'payment_status' => 'Paid'
                ]
            ];
        } catch (Exception $e) {
            error_log('Error in getRecentBookings: ' . $e->getMessage());
            return [];
        }
    }

    // Get upcoming schedules
    public function getUpcomingSchedules($owner_id) {
        try {
            return [
                [
                    'property' => 'Colombo Cricket Ground',
                    'customer' => 'Krishna Wishvajith',
                    'date' => '25',
                    'month' => 'JAN',
                    'time' => '2:00 PM - 4:00 PM',
                    'status' => 'Confirmed'
                ],
                [
                    'property' => 'Football Arena Pro',
                    'customer' => 'Team Phoenix',
                    'date' => '26',
                    'month' => 'JAN',
                    'time' => '6:00 PM - 8:00 PM',
                    'status' => 'Pending'
                ],
                [
                    'property' => 'Tennis Academy Courts',
                    'customer' => 'Sarah Johnson',
                    'date' => '27',
                    'month' => 'JAN',
                    'time' => '10:00 AM - 12:00 PM',
                    'status' => 'Confirmed'
                ]
            ];
        } catch (Exception $e) {
            error_log('Error in getUpcomingSchedules: ' . $e->getMessage());
            return [];
        }
    }

    // Get revenue overview
    public function getRevenueOverview($owner_id) {
        try {
            return [
                'this_month' => 45000,
                'last_month' => 38000,
                'growth_percentage' => 18.4,
                'pending_payouts' => 12000,
                'next_payout_date' => '2025-02-01'
            ];
        } catch (Exception $e) {
            error_log('Error in getRevenueOverview: ' . $e->getMessage());
            return [];
        }
    }

    // Get property summary
    public function getPropertySummary($owner_id) {
        try {
            return [
                'total_properties' => 3,
                'active_properties' => 3,
                'under_maintenance' => 0,
                'package_type' => 'Standard',
                'properties_limit' => 6,
                'can_add_more' => true
            ];
        } catch (Exception $e) {
            error_log('Error in getPropertySummary: ' . $e->getMessage());
            return [];
        }
    }

    // Get package information
    public function getPackageInfo($owner_id) {
        try {
            return [
                'package_name' => 'Standard',
                'commission_rate' => 12,
                'properties_limit' => 6,
                'photos_limit' => 5,
                'videos_limit' => 5,
                'featured_listings' => 3,
                'support_type' => 'Email & Phone Support'
            ];
        } catch (Exception $e) {
            error_log('Error in getPackageInfo: ' . $e->getMessage());
            return [];
        }
    }

    // Get all properties for owner
    public function getAllProperties($owner_id) {
        try {
            return [
                [
                    'id' => 1,
                    'name' => 'Colombo Cricket Ground',
                    'type' => 'Cricket',
                    'category' => 'Outdoor',
                    'price' => 5000,
                    'location' => 'Colombo 03',
                    'status' => 'Active',
                    'rating' => 4.8,
                    'total_bookings' => 45,
                    'monthly_revenue' => 18000,
                    'image' => 'cricket-ground.jpg'
                ],
                [
                    'id' => 2,
                    'name' => 'Football Arena Pro',
                    'type' => 'Football',
                    'category' => 'Outdoor',
                    'price' => 7500,
                    'location' => 'Colombo 05',
                    'status' => 'Active',
                    'rating' => 4.9,
                    'total_bookings' => 32,
                    'monthly_revenue' => 19000,
                    'image' => 'football-arena.jpg'
                ],
                [
                    'id' => 3,
                    'name' => 'Tennis Academy Courts',
                    'type' => 'Tennis',
                    'category' => 'Outdoor',
                    'price' => 2500,
                    'location' => 'Colombo 06',
                    'status' => 'Active',
                    'rating' => 4.4,
                    'total_bookings' => 28,
                    'monthly_revenue' => 8000,
                    'image' => 'tennis-courts.jpg'
                ]
            ];
        } catch (Exception $e) {
            error_log('Error in getAllProperties: ' . $e->getMessage());
            return [];
        }
    }

    // Get package limits
    public function getPackageLimits($owner_id) {
        try {
            return [
                'properties_limit' => 6,
                'current_properties' => 3,
                'photos_limit' => 5,
                'videos_limit' => 5,
                'featured_listings' => 3,
                'can_add_property' => true
            ];
        } catch (Exception $e) {
            error_log('Error in getPackageLimits: ' . $e->getMessage());
            return [];
        }
    }

    // Add new property
    public function addProperty($owner_id, $property_data) {
        try {
            // Check package limits first
            $limits = $this->getPackageLimits($owner_id);
            if (!$limits['can_add_property']) {
                return false;
            }

            // In real implementation, this would insert into database
            return true;
        } catch (Exception $e) {
            error_log('Error in addProperty: ' . $e->getMessage());
            return false;
        }
    }

    // Get single property
    public function getProperty($owner_id, $property_id) {
        try {
            // Return sample data for demo
            return [
                'id' => $property_id,
                'name' => 'Colombo Cricket Ground',
                'type' => 'Cricket',
                'category' => 'Outdoor',
                'price' => 5000,
                'location' => 'Colombo 03',
                'description' => 'Professional cricket ground with world-class facilities.',
                'features' => ['Lighting', 'Parking', 'WiFi'],
                'images' => ['cricket-ground-1.jpg', 'cricket-ground-2.jpg']
            ];
        } catch (Exception $e) {
            error_log('Error in getProperty: ' . $e->getMessage());
            return null;
        }
    }

    // Update property
    public function updateProperty($owner_id, $property_id, $property_data) {
        try {
            // In real implementation, this would update the database
            return true;
        } catch (Exception $e) {
            error_log('Error in updateProperty: ' . $e->getMessage());
            return false;
        }
    }

    // Get all bookings for owner
    public function getAllBookings($owner_id) {
        try {
            return [
                [
                    'id' => 'BK001',
                    'customer' => 'Krishna Wishvajith',
                    'property' => 'Colombo Cricket Ground',
                    'date' => '2025-01-25',
                    'time' => '2:00 PM - 4:00 PM',
                    'amount' => 5000,
                    'commission' => 600,
                    'net_amount' => 4400,
                    'status' => 'Confirmed',
                    'payment_status' => 'Paid'
                ],
                [
                    'id' => 'BK002',
                    'customer' => 'Kulakshi Thathsarani',
                    'property' => 'Football Arena Pro',
                    'date' => '2025-01-26',
                    'time' => '6:00 PM - 8:00 PM',
                    'amount' => 7500,
                    'commission' => 900,
                    'net_amount' => 6600,
                    'status' => 'Pending',
                    'payment_status' => 'Pending'
                ]
            ];
        } catch (Exception $e) {
            error_log('Error in getAllBookings: ' . $e->getMessage());
            return [];
        }
    }

    // Get booking stats
    public function getBookingStats($owner_id) {
        try {
            return [
                'total_bookings' => 105,
                'this_month' => 8,
                'confirmed' => 95,
                'pending' => 8,
                'cancelled' => 2
            ];
        } catch (Exception $e) {
            error_log('Error in getBookingStats: ' . $e->getMessage());
            return [];
        }
    }

    // Get messages for owner
    public function getMessages($owner_id) {
        try {
            return [
                [
                    'id' => 1,
                    'from' => 'Krishna Wishvajith',
                    'subject' => 'Question about booking',
                    'message' => 'Hi, I wanted to ask about the availability for this weekend.',
                    'property' => 'Colombo Cricket Ground',
                    'date' => '2025-01-20 10:30 AM',
                    'status' => 'unread',
                    'type' => 'inquiry'
                ],
                [
                    'id' => 2,
                    'from' => 'Kulakshi Thathsarani',
                    'subject' => 'Booking confirmation',
                    'message' => 'Please confirm my booking for tomorrow.',
                    'property' => 'Football Arena Pro',
                    'date' => '2025-01-20 9:15 AM',
                    'status' => 'read',
                    'type' => 'booking'
                ],
                [
                    'id' => 3,
                    'from' => 'Admin',
                    'subject' => 'Property verification',
                    'message' => 'Your property listing has been approved.',
                    'property' => 'Tennis Academy Courts',
                    'date' => '2025-01-19 2:45 PM',
                    'status' => 'read',
                    'type' => 'admin'
                ]
            ];
        } catch (Exception $e) {
            error_log('Error in getMessages: ' . $e->getMessage());
            return [];
        }
    }

    // Get unread message count
    public function getUnreadMessageCount($owner_id) {
        try {
            return 1; // Demo data
        } catch (Exception $e) {
            error_log('Error in getUnreadMessageCount: ' . $e->getMessage());
            return 0;
        }
    }

    // Send reply to message
    public function sendReply($owner_id, $message_data) {
        try {
            // In real implementation, this would save to database
            return true;
        } catch (Exception $e) {
            error_log('Error in sendReply: ' . $e->getMessage());
            return false;
        }
    }

    // Get revenue data
    public function getRevenueData($owner_id) {
        try {
            return [
                'monthly_data' => [
                    'Jan' => 45000,
                    'Feb' => 38000,
                    'Mar' => 42000,
                    'Apr' => 50000,
                    'May' => 55000,
                    'Jun' => 48000
                ],
                'total_revenue' => 278000,
                'average_monthly' => 46333,
                'highest_month' => 'May',
                'commission_paid' => 33360
            ];
        } catch (Exception $e) {
            error_log('Error in getRevenueData: ' . $e->getMessage());
            return [];
        }
    }

    // Get analytics data
    public function getAnalytics($owner_id) {
        try {
            return [
                'property_performance' => [
                    ['name' => 'Football Arena Pro', 'bookings' => 32, 'revenue' => 19000],
                    ['name' => 'Colombo Cricket Ground', 'bookings' => 45, 'revenue' => 18000],
                    ['name' => 'Tennis Academy Courts', 'bookings' => 28, 'revenue' => 8000]
                ],
                'customer_demographics' => [
                    'age_groups' => ['18-25' => 45, '26-35' => 35, '36+' => 20],
                    'sports_preference' => ['Cricket' => 40, 'Football' => 35, 'Tennis' => 25]
                ],
                'booking_trends' => [
                    'peak_hours' => ['6-8 PM' => 35, '4-6 PM' => 28, '2-4 PM' => 20],
                    'peak_days' => ['Saturday' => 25, 'Sunday' => 22, 'Friday' => 18]
                ]
            ];
        } catch (Exception $e) {
            error_log('Error in getAnalytics: ' . $e->getMessage());
            return [];
        }
    }

    // Get profile data
    public function getProfileData($owner_id) {
        try {
            if (!$this->db) {
                return $this->getDefaultProfileData();
            }

            // In real implementation, fetch from database
            return [
                'owner_name' => 'Rajesh Kumar',
                'business_name' => 'Kumar Sports Complex',
                'email' => 'owner@example.com',
                'phone' => '+94 71 234 5678',
                'address' => '123 Galle Road, Colombo 03',
                'business_registration' => 'PV123456',
                'package_type' => 'Standard',
                'member_since' => 'January 2024',
                'total_properties' => 3,
                'total_revenue' => 278000,
                'rating' => 4.6
            ];
        } catch (Exception $e) {
            error_log('Error in getProfileData: ' . $e->getMessage());
            return $this->getDefaultProfileData();
        }
    }

    private function getDefaultProfileData() {
        return [
            'owner_name' => 'Stadium Owner',
            'business_name' => 'Sports Complex',
            'email' => 'owner@example.com',
            'phone' => 'Not set',
            'address' => 'Not set',
            'business_registration' => 'Not set',
            'package_type' => 'Basic',
            'member_since' => 'January 2025',
            'total_properties' => 0,
            'total_revenue' => 0,
            'rating' => 0.0
        ];
    }

    // Update profile
    public function updateProfile($owner_id, $profile_data) {
        try {
            if (!$this->db) {
                return false;
            }

            // In real implementation, this would update the database
            return true;
        } catch (Exception $e) {
            error_log('Error in updateProfile: ' . $e->getMessage());
            return false;
        }
    }
}