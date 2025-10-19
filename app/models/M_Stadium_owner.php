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

            // For now return demo data, later replace with actual database queries
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
            // Return sample data for now
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
}
?>