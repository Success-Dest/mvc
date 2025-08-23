<?php require APPROOT.'/views/inc/components/header.php'; ?>

<!-- Hero Section -->
<section class="stadiums-hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1><?php echo $data['title']; ?></h1>
            <p>Book premium stadiums and sports facilities across Sri Lanka</p>
        </div>
        
        <!-- Search & Filter Bar -->
        <div class="search-filter-bar">
            <div class="search-container">
                <div class="search-group">
                    <input type="text" placeholder="Search by stadium name or sport..." class="search-input">
                    <button class="search-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="filters-container">
                <div class="filter-group">
                    <select class="filter-select" id="sportFilter">
                        <option value="">All Sports</option>
                        <option value="cricket">Cricket</option>
                        <option value="football">Football</option>
                        <option value="tennis">Tennis</option>
                        <option value="basketball">Basketball</option>
                        <option value="swimming">Swimming</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <select class="filter-select" id="categoryFilter">
                        <option value="">Indoor & Outdoor</option>
                        <option value="indoor">Indoor Only</option>
                        <option value="outdoor">Outdoor Only</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <select class="filter-select" id="locationFilter">
                        <option value="">All Locations</option>
                        <option value="colombo-03">Colombo 03</option>
                        <option value="colombo-05">Colombo 05</option>
                        <option value="colombo-06">Colombo 06</option>
                        <option value="colombo-07">Colombo 07</option>
                        <option value="angoda">Angoda</option>
                        <option value="mount-lavinia">Mount Lavinia</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <select class="filter-select" id="priceFilter">
                        <option value="">Any Price</option>
                        <option value="0-3000">Under ₹3,000</option>
                        <option value="3000-5000">₹3,000 - ₹5,000</option>
                        <option value="5000-8000">₹5,000 - ₹8,000</option>
                        <option value="8000+">Above ₹8,000</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Results Section -->
<section class="stadiums-results">
    <div class="results-container">
        <div class="results-header">
            <div class="results-info">
                <h2>Available Stadiums</h2>
                <p class="results-count"><?php echo count($data['stadiums']); ?> stadiums found</p>
            </div>
            
            <div class="sort-options">
                <select class="sort-select" id="sortOptions">
                    <option value="rating">Sort by Rating</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="name">Name A-Z</option>
                </select>
            </div>
        </div>
        
        <!-- Stadium Cards Grid -->
        <div class="stadiums-grid" id="stadiumsGrid">
            <?php foreach($data['stadiums'] as $stadium): ?>
            <div class="stadium-card" 
                 data-sport="<?php echo strtolower($stadium->type); ?>" 
                 data-category="<?php echo strtolower($stadium->category); ?>"
                 data-price="<?php echo $stadium->price; ?>">
                
                <!-- Stadium Image -->
                <div class="stadium-image">
                    <img src="<?php echo URLROOT; ?>/images/stadiums/<?php echo $stadium->image; ?>" 
                         alt="<?php echo $stadium->name; ?>"
                         onerror="this.src='<?php echo URLROOT; ?>/images/stadiums/default-stadium.jpg'">
                    
                    <!-- Status Badge -->
                    <div class="status-badge status-<?php echo strtolower($stadium->status); ?>">
                        <?php echo $stadium->status; ?>
                    </div>
                    
                    <!-- Category Badge -->
                    <div class="category-badge">
                        <?php echo $stadium->category; ?>
                    </div>
                    
                    <!-- Rating Badge -->
                    <div class="rating-badge">
                        <span class="star">⭐</span>
                        <span class="rating"><?php echo $stadium->rating; ?></span>
                    </div>
                </div>
                
                <!-- Stadium Info -->
                <div class="stadium-info">
                    <div class="stadium-header">
                        <h3 class="stadium-name"><?php echo $stadium->name; ?></h3>
                        <div class="stadium-price">
                            <span class="currency">₹</span>
                            <span class="amount"><?php echo number_format($stadium->price); ?></span>
                            <span class="period">per hour</span>
                        </div>
                    </div>
                    
                    <div class="stadium-location">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        <span><?php echo $stadium->location; ?></span>
                    </div>
                    
                    <!-- Stadium Features -->
                    <div class="stadium-features">
                        <?php foreach(array_slice($stadium->features, 0, 3) as $feature): ?>
                            <span class="feature-tag">
                                <?php 
                                // Add icons for features
                                $icon = '';
                                switch(strtolower($feature)) {
                                    case 'lighting': $icon = '💡'; break;
                                    case 'parking': $icon = '🚗'; break;
                                    case 'wifi': $icon = '📶'; break;
                                    case 'air conditioning': $icon = '❄️'; break;
                                    case 'professional turf': $icon = '🌱'; break;
                                    case 'clay courts': $icon = '🎾'; break;
                                    case 'equipment rental': $icon = '⚽'; break;
                                    case 'professional court': $icon = '🏀'; break;
                                    case 'sound system': $icon = '🔊'; break;
                                    case 'seating': $icon = '🪑'; break;
                                    case 'olympic size': $icon = '🏊'; break;
                                    case 'changing rooms': $icon = '🚪'; break;
                                    case 'lifeguard': $icon = '🏊‍♂️'; break;
                                    default: $icon = '✓'; break;
                                }
                                echo $icon . ' ' . $feature;
                                ?>
                            </span>
                        <?php endforeach; ?>
                        
                        <?php if($stadium->more_features > 0): ?>
                            <span class="more-features">+<?php echo $stadium->more_features; ?> more</span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Stadium Owner -->
                    <div class="stadium-owner">
                        <div class="owner-avatar">
                            <?php echo substr($stadium->owner, 0, 1); ?>
                        </div>
                        <div class="owner-info">
                            <span class="owner-name"><?php echo $stadium->owner; ?></span>
                            <span class="owner-status status-<?php echo strtolower($stadium->owner_status); ?>">
                                <span class="status-dot"></span>
                                <?php echo $stadium->owner_status; ?>
                            </span>
                        </div>
                        <button class="info-btn" onclick="showStadiumInfo(<?php echo $stadium->id; ?>)">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="stadium-actions">
                        <button class="btn-contact" onclick="contactOwner(<?php echo $stadium->id; ?>)">
                            Contact
                        </button>
                        <button class="btn-book <?php echo $stadium->status === 'Booked' ? 'btn-booked' : ''; ?>" 
                                <?php echo $stadium->status === 'Booked' ? 'disabled' : ''; ?>
                                onclick="<?php echo $stadium->status === 'Booked' ? '' : 'bookStadium(' . $stadium->id . ')'; ?>">
                            <?php echo $stadium->status === 'Booked' ? 'Booked' : 'Book Now'; ?>
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Load More Button -->
        <div class="load-more-section">
            <button class="btn-load-more" id="loadMoreBtn">
                Load More Stadiums
            </button>
        </div>
    </div>
</section>

<script>
// Stadium filtering functionality
function filterStadiums() {
    const sport = document.getElementById('sportFilter').value;
    const category = document.getElementById('categoryFilter').value;
    const price = document.getElementById('priceFilter').value;
    const cards = document.querySelectorAll('.stadium-card');
    
    cards.forEach(card => {
        let show = true;
        
        // Filter by sport
        if (sport && card.dataset.sport !== sport) {
            show = false;
        }
        
        // Filter by category
        if (category && card.dataset.category !== category) {
            show = false;
        }
        
        // Filter by price range
        if (price) {
            const cardPrice = parseInt(card.dataset.price);
            const [min, max] = price.split('-').map(p => parseInt(p.replace('+', '')));
            
            if (price.includes('+')) {
                if (cardPrice <= min) show = false;
            } else {
                if (cardPrice < min || cardPrice > max) show = false;
            }
        }
        
        card.style.display = show ? 'block' : 'none';
    });
    
    updateResultsCount();
}

function updateResultsCount() {
    const visibleCards = document.querySelectorAll('.stadium-card[style*="block"], .stadium-card:not([style*="none"])').length;
    document.querySelector('.results-count').textContent = `${visibleCards} stadiums found`;
}

function sortStadiums() {
    const sortValue = document.getElementById('sortOptions').value;
    const grid = document.getElementById('stadiumsGrid');
    const cards = Array.from(grid.querySelectorAll('.stadium-card'));
    
    cards.sort((a, b) => {
        switch(sortValue) {
            case 'price-low':
                return parseInt(a.dataset.price) - parseInt(b.dataset.price);
            case 'price-high':
                return parseInt(b.dataset.price) - parseInt(a.dataset.price);
            case 'name':
                return a.querySelector('.stadium-name').textContent.localeCompare(b.querySelector('.stadium-name').textContent);
            case 'rating':
            default:
                const ratingA = parseFloat(a.querySelector('.rating').textContent);
                const ratingB = parseFloat(b.querySelector('.rating').textContent);
                return ratingB - ratingA;
        }
    });
    
    cards.forEach(card => grid.appendChild(card));
}

function showStadiumInfo(id) {
    alert(`Stadium info for ID: ${id} - Full details modal would open here`);
}

function contactOwner(id) {
    alert(`Contact owner functionality for stadium ID: ${id}`);
}

function bookStadium(id) {
    if(confirm('Proceed to booking for this stadium?')) {
        window.location.href = `<?php echo URLROOT; ?>/booking/stadium/${id}`;
    }
}

// Event listeners
document.getElementById('sportFilter').addEventListener('change', filterStadiums);
document.getElementById('categoryFilter').addEventListener('change', filterStadiums);
document.getElementById('priceFilter').addEventListener('change', filterStadiums);
document.getElementById('locationFilter').addEventListener('change', filterStadiums);
document.getElementById('sortOptions').addEventListener('change', sortStadiums);

// Search functionality
document.querySelector('.search-input').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const cards = document.querySelectorAll('.stadium-card');
    
    cards.forEach(card => {
        const stadiumName = card.querySelector('.stadium-name').textContent.toLowerCase();
        const show = stadiumName.includes(searchTerm);
        card.style.display = show ? 'block' : 'none';
    });
    
    updateResultsCount();
});

// Load more functionality
document.getElementById('loadMoreBtn').addEventListener('click', function() {
    alert('Load more stadiums functionality would fetch additional results');
});
</script>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>