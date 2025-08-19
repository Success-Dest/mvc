<?php require APPROOT.'/views/admin/inc/header.php'; ?>

<div class="main-content">
    <div class="dashboard-header">
        <h1>Message Center</h1>
        <div class="header-actions">
            <button class="btn-compose" onclick="openComposeModal()">✉️ Compose Message</button>
        </div>
    </div>

    <!-- Message Stats -->
    <div class="message-stats">
        <div class="stat-item">
            <div class="stat-icon">📧</div>
            <div class="stat-details">
                <span class="stat-number">48</span>
                <span class="stat-label">Total Messages</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">📬</div>
            <div class="stat-details">
                <span class="stat-number">12</span>
                <span class="stat-label">Unread</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">⚡</div>
            <div class="stat-details">
                <span class="stat-number">8</span>
                <span class="stat-label">Priority</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">💬</div>
            <div class="stat-details">
                <span class="stat-number">24</span>
                <span class="stat-label">Conversations</span>
            </div>
        </div>
    </div>

    <div class="messages-layout">
        <!-- Message Sidebar -->
        <div class="messages-sidebar">
            <div class="message-filters">
                <button class="filter-btn active" data-filter="all">All Messages</button>
                <button class="filter-btn" data-filter="unread">Unread (12)</button>
                <button class="filter-btn" data-filter="priority">Priority</button>
                <button class="filter-btn" data-filter="support">Support</button>
                <button class="filter-btn" data-filter="complaints">Complaints</button>
            </div>

            <div class="messages-list">
                <div class="message-item active" data-message="1">
                    <div class="message-avatar">J</div>
                    <div class="message-preview">
                        <div class="message-header">
                            <span class="sender-name">John Doe</span>
                            <span class="message-time">2:30 PM</span>
                        </div>
                        <div class="message-subject">Booking Cancellation Request</div>
                        <div class="message-excerpt">Hi, I need to cancel my booking for tomorrow...</div>
                    </div>
                    <div class="message-status unread"></div>
                </div>

                <div class="message-item" data-message="2">
                    <div class="message-avatar">S</div>
                    <div class="message-preview">
                        <div class="message-header">
                            <span class="sender-name">Stadium Owner 1</span>
                            <span class="message-time">1:15 PM</span>
                        </div>
                        <div class="message-subject">Payout Inquiry</div>
                        <div class="message-excerpt">When will I receive this week's payout...</div>
                    </div>
                    <div class="message-status read"></div>
                </div>

                <div class="message-item" data-message="3">
                    <div class="message-avatar">M</div>
                    <div class="message-preview">
                        <div class="message-header">
                            <span class="sender-name">Mike Wilson</span>
                            <span class="message-time">11:45 AM</span>
                        </div>
                        <div class="message-subject">Equipment Rental Issue</div>
                        <div class="message-excerpt">The basketball I rented was damaged...</div>
                    </div>
                    <div class="message-status priority"></div>
                </div>

                <div class="message-item" data-message="4">
                    <div class="message-avatar">C</div>
                    <div class="message-preview">
                        <div class="message-header">
                            <span class="sender-name">Coach Sarah</span>
                            <span class="message-time">10:20 AM</span>
                        </div>
                        <div class="message-subject">Training Session Schedule</div>
                        <div class="message-excerpt">Can we discuss availability for group sessions...</div>
                    </div>
                    <div class="message-status read"></div>
                </div>

                <div class="message-item" data-message="5">
                    <div class="message-avatar">R</div>
                    <div class="message-preview">
                        <div class="message-header">
                            <span class="sender-name">Rental Owner Alex</span>
                            <span class="message-time">Yesterday</span>
                        </div>
                        <div class="message-subject">New Equipment Listing</div>
                        <div class="message-excerpt">I'd like to add new tennis rackets to my inventory...</div>
                    </div>
                    <div class="message-status read"></div>
                </div>
            </div>
        </div>

        <!-- Message Content -->
        <div class="message-content">
            <div class="message-header-bar">
                <div class="conversation-info">
                    <h3>Booking Cancellation Request</h3>
                    <p>Conversation with John Doe</p>
                </div>
                <div class="message-actions">
                    <button class="btn-action-sm btn-archive">Archive</button>
                    <button class="btn-action-sm btn-priority">Mark Priority</button>
                    <button class="btn-action-sm btn-delete">Delete</button>
                </div>
            </div>

            <div class="conversation-thread">
                <div class="message-bubble received">
                    <div class="message-info">
                        <span class="sender">John Doe</span>
                        <span class="timestamp">Today at 2:30 PM</span>
                    </div>
                    <div class="message-text">
                        Hi Admin,<br><br>
                        I need to cancel my booking for tomorrow (August 20th) at the Colombo Cricket Ground from 2:00 PM to 4:00 PM. 
                        Something urgent came up and I won't be able to make it.<br><br>
                        My booking ID is #BK0045. Can you please process the cancellation and refund?<br><br>
                        Thanks!
                    </div>
                </div>

                <div class="message-bubble sent">
                    <div class="message-info">
                        <span class="sender">Admin (You)</span>
                        <span class="timestamp">Today at 2:35 PM</span>
                    </div>
                    <div class="message-text">
                        Hi John,<br><br>
                        I've received your cancellation request for booking #BK0045. Since it's more than 24 hours before your booking time, 
                        you're eligible for a full refund according to our policy.<br><br>
                        I'll process the cancellation and refund now. You should see the refund in your account within 3-5 business days.
                    </div>
                </div>

                <div class="message-bubble received">
                    <div class="message-info">
                        <span class="sender">John Doe</span>
                        <span class="timestamp">Today at 2:40 PM</span>
                    </div>
                    <div class="message-text">
                        Perfect! Thank you so much for the quick response. Really appreciate the excellent customer service! 🙏
                    </div>
                </div>
            </div>

            <div class="reply-section">
                <div class="reply-form">
                    <textarea placeholder="Type your reply..." rows="4"></textarea>
                    <div class="reply-actions">
                        <button class="btn-attach">📎</button>
                        <button class="btn-emoji">😊</button>
                        <button class="btn-send">Send Reply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Compose Message Modal -->
<div id="composeModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Compose New Message</h3>
            <span class="close" onclick="closeComposeModal()">&times;</span>
        </div>
        <form class="compose-form">
            <div class="form-group">
                <label>To:</label>
                <select name="recipient" required>
                    <option value="">Select Recipient</option>
                    <option value="all_users">All Users</option>
                    <option value="customers">All Customers</option>
                    <option value="stadium_owners">All Stadium Owners</option>
                    <option value="coaches">All Coaches</option>
                    <option value="rental_owners">All Rental Owners</option>
                    <option value="individual">Specific User</option>
                </select>
            </div>
            
            <div class="form-group" id="userSelect" style="display: none;">
                <label>Select User:</label>
                <input type="text" placeholder="Search and select user..." id="userSearch">
            </div>

            <div class="form-group">
                <label>Subject:</label>
                <input type="text" name="subject" required placeholder="Enter message subject">
            </div>

            <div class="form-group">
                <label>Priority:</label>
                <select name="priority">
                    <option value="normal">Normal</option>
                    <option value="high">High Priority</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>

            <div class="form-group">
                <label>Message:</label>
                <textarea name="message" rows="8" required placeholder="Type your message here..."></textarea>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeComposeModal()">Cancel</button>
                <button type="submit" class="btn-send-message">Send Message</button>
            </div>
        </form>
    </div>
</div>

<style>
.message-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.messages-layout {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 0;
    height: 600px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.messages-sidebar {
    background: rgba(0, 0, 0, 0.3);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    flex-direction: column;
}

.message-filters {
    padding: 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.filter-btn {
    background: transparent;
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ccc;
    padding: 10px 15px;
    border-radius: 8px;
    cursor: pointer;
    text-align: left;
    transition: all 0.3s ease;
}

.filter-btn:hover,
.filter-btn.active {
    background: rgba(0, 255, 0, 0.1);
    border-color: #00ff00;
    color: #00ff00;
}

.messages-list {
    flex: 1;
    overflow-y: auto;
}

.message-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.message-item:hover,
.message-item.active {
    background: rgba(0, 255, 0, 0.1);
}

.message-avatar {
    width: 45px;
    height: 45px;
    background: #00ff00;
    color: #000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 16px;
}

.message-preview {
    flex: 1;
    min-width: 0;
}

.message-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 5px;
}

.sender-name {
    font-weight: 600;
    color: #fff;
    font-size: 14px;
}

.message-time {
    font-size: 12px;
    color: #888;
}

.message-subject {
    font-weight: 500;
    color: #fff;
    margin-bottom: 5px;
    font-size: 13px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.message-excerpt {
    font-size: 12px;
    color: #888;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.message-status {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
}

.message-status.unread {
    background: #00ff00;
}

.message-status.priority {
    background: #ff4444;
}

.message-status.read {
    background: transparent;
}

.message-content {
    display: flex;
    flex-direction: column;
    background: rgba(255, 255, 255, 0.02);
}

.message-header-bar {
    padding: 20px 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(0, 0, 0, 0.2);
}

.conversation-info h3 {
    color: #fff;
    margin: 0 0 5px 0;
    font-size: 18px;
}

.conversation-info p {
    color: #888;
    margin: 0;
    font-size: 14px;
}

.conversation-thread {
    flex: 1;
    overflow-y: auto;
    padding: 20px 30px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.message-bubble {
    max-width: 70%;
    padding: 15px 20px;
    border-radius: 15px;
    position: relative;
}

.message-bubble.received {
    align-self: flex-start;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.message-bubble.sent {
    align-self: flex-end;
    background: rgba(0, 255, 0, 0.2);
    border: 1px solid rgba(0, 255, 0, 0.3);
}

.message-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    font-size: 12px;
}

.message-info .sender {
    font-weight: 600;
    color: #fff;
}

.message-info .timestamp {
    color: #888;
}

.message-text {
    color: #fff;
    line-height: 1.5;
    font-size: 14px;
}

.reply-section {
    padding: 20px 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(0, 0, 0, 0.2);
}

.reply-form textarea {
    width: 100%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    padding: 15px;
    color: #fff;
    resize: vertical;
    margin-bottom: 15px;
}

.reply-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.btn-attach,
.btn-emoji {
    background: transparent;
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ccc;
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
}

.btn-send,
.btn-send-message {
    background: #00ff00;
    color: #000;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

.btn-compose {
    background: #00ff00;
    color: #000;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

.btn-archive {
    background: #6c757d;
    color: white;
}

.btn-priority {
    background: #ffc107;
    color: #000;
}

.compose-form {
    padding: 25px;
}

.compose-form .form-group {
    margin-bottom: 20px;
}

.compose-form label {
    display: block;
    color: #ccc;
    margin-bottom: 8px;
    font-weight: 500;
}

.compose-form input,
.compose-form select,
.compose-form textarea {
    width: 100%;
    padding: 12px 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    color: #fff;
    font-size: 14px;
}

@media (max-width: 768px) {
    .messages-layout {
        grid-template-columns: 1fr;
        height: auto;
    }
    
    .messages-sidebar {
        height: 300px;
    }
    
    .message-content {
        height: 400px;
    }
    
    .message-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<script>
// Message item selection
document.querySelectorAll('.message-item').forEach(item => {
    item.addEventListener('click', function() {
        document.querySelectorAll('.message-item').forEach(i => i.classList.remove('active'));
        this.classList.add('active');
        
        // Load message content here
        const messageId = this.dataset.message;
        console.log('Loading message:', messageId);
    });
});

// Filter functionality
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        const filter = this.dataset.filter;
        console.log('Filtering messages by:', filter);
    });
});

// Compose modal
function openComposeModal() {
    document.getElementById('composeModal').style.display = 'block';
}

function closeComposeModal() {
    document.getElementById('composeModal').style.display = 'none';
}

// Recipient selection change
document.querySelector('select[name="recipient"]').addEventListener('change', function() {
    const userSelect = document.getElementById('userSelect');
    if (this.value === 'individual') {
        userSelect.style.display = 'block';
    } else {
        userSelect.style.display = 'none';
    }
});

// Send reply
document.querySelector('.btn-send').addEventListener('click', function() {
    const textarea = document.querySelector('.reply-form textarea');
    const message = textarea.value.trim();
    
    if (message) {
        // Add message to conversation
        alert('Reply sent: ' + message);
        textarea.value = '';
    }
});

// Message actions
document.querySelector('.btn-archive').addEventListener('click', function() {
    alert('Message archived');
});

document.querySelector('.btn-priority').addEventListener('click', function() {
    alert('Message marked as priority');
});

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('composeModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php require APPROOT.'/views/admin/inc/footer.php'; ?>