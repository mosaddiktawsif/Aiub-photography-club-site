// JavaScript form validation for AIUB Photography Club

/**
 * Validate login form
 */
function validateLoginForm() {
    const username = document.querySelector('input[name="username"]').value.trim();
    const password = document.querySelector('input[name="password"]').value.trim();
    
    if (!username) {
        alert('Please enter your username');
        return false;
    }
    if (username.length < 3) {
        alert('Username must be at least 3 characters');
        return false;
    }
    if (!password) {
        alert('Please enter your password');
        return false;
    }
    if (password.length < 3) {
        alert('Password must be at least 3 characters');
        return false;
    }
    return true;
}

/**
 * Validate signup form
 */
function validateSignupForm() {
    const username = document.querySelector('input[name="username"]').value.trim();
    const password = document.querySelector('input[name="password"]').value.trim();
    
    if (!username) {
        alert('Please enter a username');
        return false;
    }
    if (username.length < 3) {
        alert('Username must be at least 3 characters');
        return false;
    }
    if (!/^[a-zA-Z0-9_]+$/.test(username)) {
        alert('Username can only contain letters, numbers, and underscores');
        return false;
    }
    if (!password) {
        alert('Please enter a password');
        return false;
    }
    if (password.length < 6) {
        alert('Password must be at least 6 characters');
        return false;
    }
    return true;
}

/**
 * Validate notice form
 */
function validateNoticeForm() {
    const title = document.querySelector('input[name="title"]').value.trim();
    const message = document.querySelector('textarea[name="message"]').value.trim();
    
    if (!title) {
        alert('Please enter a notice title');
        return false;
    }
    if (title.length < 5) {
        alert('Title must be at least 5 characters');
        return false;
    }
    if (!message) {
        alert('Please enter notice details');
        return false;
    }
    if (message.length < 10) {
        alert('Message must be at least 10 characters');
        return false;
    }
    return true;
}

/**
 * Validate blog form
 */
function validateBlogForm() {
    const title = document.querySelector('input[name="title"]').value.trim();
    const content = document.querySelector('textarea[name="content"]').value.trim();
    
    if (!title) {
        alert('Please enter a blog title');
        return false;
    }
    if (title.length < 5) {
        alert('Title must be at least 5 characters');
        return false;
    }
    if (!content) {
        alert('Please enter blog content');
        return false;
    }
    if (content.length < 20) {
        alert('Content must be at least 20 characters');
        return false;
    }
    return true;
}

/**
 * Validate gallery upload form
 */
function validateGalleryForm() {
    const description = document.querySelector('input[name="description"]').value.trim();
    const imageFile = document.querySelector('input[name="image"]').files[0];
    
    if (!description) {
        alert('Please enter a photo caption/description');
        return false;
    }
    if (description.length < 3) {
        alert('Description must be at least 3 characters');
        return false;
    }
    if (!imageFile) {
        alert('Please select an image file');
        return false;
    }
    
    // Validate file type
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!allowedTypes.includes(imageFile.type)) {
        alert('Please upload a valid image file (JPG, PNG, GIF, or WebP)');
        return false;
    }
    
    // Validate file size (max 5MB)
    const maxSize = 5 * 1024 * 1024; // 5MB
    if (imageFile.size > maxSize) {
        alert('Image file size must not exceed 5MB');
        return false;
    }
    
    return true;
}

/**
 * Validate result form
 */
function validateResultForm() {
    const name = document.querySelector('input[name="name"]').value.trim();
    const phone = document.querySelector('input[name="phone"]').value.trim();
    const qty = document.querySelector('input[name="qty"]').value.trim();
    
    if (!name) {
        alert('Please enter participant name');
        return false;
    }
    if (name.length < 3) {
        alert('Name must be at least 3 characters');
        return false;
    }
    if (!phone) {
        alert('Please enter contact number');
        return false;
    }
    if (!/^[0-9\-\+\(\)\s]+$/.test(phone)) {
        alert('Please enter a valid phone number');
        return false;
    }
    if (!qty) {
        alert('Please enter number of selected photos');
        return false;
    }
    const qtyNum = parseInt(qty);
    if (isNaN(qtyNum) || qtyNum < 1) {
        alert('Selected photos quantity must be at least 1');
        return false;
    }
    if (qtyNum > 999) {
        alert('Selected photos quantity cannot exceed 999');
        return false;
    }
    return true;
}

/**
 * Prevent delete confirmation if needed (alternative to inline confirm)
 */
function confirmDelete(message) {
    return confirm(message || 'Are you sure you want to delete this item?');
}
