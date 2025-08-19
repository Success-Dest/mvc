<?php require APPROOT.'/views/admin/inc/header.php'; ?>

<div class="main-content">
    <div class="dashboard-header">
        <h1>Content Management</h1>
        <div class="content-actions">
            <button class="btn-save">Save Changes</button>
        </div>
    </div>

    <div class="content-grid">
        <!-- Hero Section Management -->
        <div class="content-card">
            <div class="card-header">
                <h3>Hero Section</h3>
            </div>
            <div class="content-form">
                <div class="form-group">
                    <label for="hero-title">Hero Title</label>
                    <input type="text" id="hero-title" value="<?php echo $data['hero_title']; ?>" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="hero-description">Hero Description</label>
                    <textarea id="hero-description" rows="4" class="form-control"><?php echo $data['hero_description']; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="hero-bg">Background Image</label>
                    <div class="image-upload">
                        <input type="file" id="hero-bg" accept="image/*" class="file-input">
                        <div class="image-preview">
                            <img src="<?php echo URLROOT; ?>/images/<?php echo $data['hero_bg_image']; ?>" alt="Current Hero Image">
                        </div>
                        <button type="button" class="btn-upload">Change Image</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Content Management -->
        <div class="content-card">
            <div class="card-header">
                <h3>Footer Content</h3>
            </div>
            <div class="content-form">
                <div class="form-group">
                    <label for="company-name">Company Name</label>
                    <input type="text" id="company-name" value="BookMyGround" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="tagline">Tagline</label>
                    <input type="text" id="tagline" value="Defend, take care of the ball, rebound, and play hard." class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" rows="3" class="form-control">4200 Reid Avenue, Colombo 07</textarea>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" value="(071) 111 1111" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="support@bookmyground.lk" class="form-control">
                </div>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="content-card">
            <div class="card-header">
                <h3>Social Media Links</h3>
            </div>
            <div class="content-form">
                <div class="form-group">
                    <label for="facebook">Facebook URL</label>
                    <input type="url" id="facebook" placeholder="https://facebook.com/bookmyground" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="instagram">Instagram URL</label>
                    <input type="url" id="instagram" placeholder="https://instagram.com/bookmyground" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="twitter">Twitter URL</label>
                    <input type="url" id="twitter" placeholder="https://twitter.com/bookmyground" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="linkedin">LinkedIn URL</label>
                    <input type="url" id="linkedin" placeholder="https://linkedin.com/company/bookmyground" class="form-control">
                </div>
            </div>
        </div>

        <!-- Navigation Menu Management -->
        <div class="content-card">
            <div class="card-header">
                <h3>Navigation Menu</h3>
            </div>
            <div class="menu-items">
                <div class="menu-item">
                    <input type="text" value="Home" class="form-control">
                    <input type="text" value="/" class="form-control">
                    <button class="btn-remove">Remove</button>
                </div>
                <div class="menu-item">
                    <input type="text" value="Stadiums" class="form-control">
                    <input type="text" value="/stadiums" class="form-control">
                    <button class="btn-remove">Remove</button>
                </div>
                <div class="menu-item">
                    <input type="text" value="Coaches" class="form-control">
                    <input type="text" value="/coaches" class="form-control">
                    <button class="btn-remove">Remove</button>
                </div>
                <button class="btn-add-menu">+ Add Menu Item</button>
            </div>
        </div>
    </div>
</div>

<style>
.content-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 30px;
}

.content-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    overflow: hidden;
}

.content-form {
    padding: 25px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    color: #ccc;
    margin-bottom: 8px;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    color: #fff;
    font-size: 14px;
}

.form-control:focus {
    outline: none;
    border-color: #00ff00;
    background: rgba(255, 255, 255, 0.15);
}

.image-upload {
    border: 2px dashed rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    padding: 20px;
    text-align: center;
}

.image-preview img {
    max-width: 200px;
    max-height: 150px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.btn-upload, .btn-save, .btn-add-menu {
    background: #00ff00;
    color: #000;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-upload:hover, .btn-save:hover, .btn-add-menu:hover {
    background: #00cc00;
}

.menu-items {
    padding: 25px;
}

.menu-item {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-bottom: 15px;
}

.menu-item .form-control {
    flex: 1;
}

.btn-remove {
    background: #ff4444;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
}

.content-actions .btn-save {
    font-size: 16px;
    padding: 12px 30px;
}
</style>

<?php require APPROOT.'/views/admin/inc/footer.php'; ?>