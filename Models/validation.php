<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function sanitize($s) {
    return trim($s);
}

function is_valid_username($u) {
    $u = trim($u);
    if ($u === '') return false;
    if (strlen($u) < 3 || strlen($u) > 50) return false;
    return preg_match('/^[A-Za-z0-9_\-\.]+$/', $u);
}

function is_valid_password($p) {
    if (strlen($p) < 6) return false;
    return true;
}

function is_valid_title($t) {
    $t = trim($t);
    return ($t !== '' && strlen($t) <= 255);
}

function is_valid_content($c) {
    $c = trim($c);
    return ($c !== '' && strlen($c) <= 10000);
}

function is_valid_phone($p) {
    $p = trim($p);
    return preg_match('/^[0-9\s\+\-\(\)]+$/', $p) && strlen($p) <= 30;
}

function validate_image_upload($file, &$error=null) {
    $maxBytes = 5 * 1024 * 1024;
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        $error = 'No file uploaded or upload error.';
        return false;
    }
    if ($file['size'] > $maxBytes) {
        $error = 'File too large. Max 5MB.';
        return false;
    }
    $finfo = @finfo_open(FILEINFO_MIME_TYPE);
    $mime = $finfo ? finfo_file($finfo, $file['tmp_name']) : mime_content_type($file['tmp_name']);
    if ($finfo) @finfo_close($finfo);
    $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
    if (!in_array($mime, $allowed)) {
        $error = 'Invalid image type.';
        return false;
    }
    return true;
}

function ensure_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    if (empty($_SESSION['csrf_token'])) return false;
    return hash_equals($_SESSION['csrf_token'], $token);
}

?>
