<?php
$logFile = getenv('ERROR_LOG_FILE') ?: './errors.log';

if (!file_exists($logFile)) {
    $file = fopen($logFile, 'w');
    fclose($file);
    chmod($logFile, 0600);
}

$environment = getenv('ENVIRONMENT');

if ($environment === 'development') {
    ini_set('display_errors', '1');
    ini_set('log_errors', '1');
    ini_set('error_log', $logFile);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
    ini_set('error_log', $logFile);
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
    set_error_handler("log_error");
}

function log_error($errno, $errstr, $errfile, $errline) {
    $errorMessage = "Error: [$errno] $errstr - $errfile:$errline";
    error_log($errorMessage);
    echo "Er is iets misgegaan. Probeer het later opnieuw.";
}

$informatienognietafgemaakt = '<div class="Alert-sc-lrsio9-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="Alert___StyledIconInfo-sc-lrsio9-5 jcPVRX">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="12" y1="16" x2="12" y2="12"></line>
        <line x1="12" y1="8" x2="12.01" y2="8"></line>
    </svg>
    <h4 style="text-align:center;font-size:large;">Deze pagina is nog niet geheel werkend. Meld enige bugs bij Dishairano!</h4>
</div>';

// Database configuration - Using default XAMPP credentials
$database = [
    'host' => 'localhost',
    'user' => 'root',  // Default XAMPP username
    'password' => '',   // Default XAMPP password is blank
    'database' => 'admin_SuperGMSWHMCS'
];

// // Database configuration
// $database = [
//     'host' => 'localhost',
//     'user' => 'admin_SuperGMSWHMCS',
//     'password' => 'GtyWiVjsM9di4PWi2mtw21s6X5TuF54YoFa7iFoDXONodqAHTl',
//     'database' => 'admin_SuperGMSWHMCS'
// ];
// Create database connection with error handling
try {
    $db = new mysqli($database['host'], $database['user'], $database['password'], $database['database']);
    
    if ($db->connect_error) {
        error_log('Database connection failed: ' . $db->connect_error);
        die('Connection error occurred');
    }
    
    // Set charset to prevent SQL injection via character encoding
    $db->set_charset('utf8mb4');
    
} catch (Exception $e) {
    error_log('Database connection exception: ' . $e->getMessage());
    die('Connection error occurred');
}

$site = 'https://mijn.district-rijnmond.net';

// Enhanced salt generator using strong cryptographic function
function generateUniqueSalt() {
    try {
        return bin2hex(random_bytes(32));
    } catch (Exception $e) {
        error_log('Salt generation failed: ' . $e->getMessage());
        die('Security error occurred');
    }
}

// Improved random string generator using cryptographically secure function
function generateRandomString($length) {
    try {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $bytes = random_bytes($length);
        $string = '';
        
        for ($i = 0; $i < $length; $i++) {
            $string .= $chars[ord($bytes[$i]) % strlen($chars)];
        }
        
        return $string;
    } catch (Exception $e) {
        error_log('Random string generation failed: ' . $e->getMessage());
        return false;
    }
}

// Secure session handling
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Enhanced session security settings
ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', 'Strict');
ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');

// Session timeout handling
$session_timeout = 1800; // 30 minutes

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $session_timeout) {
    session_unset();
    session_destroy();
    session_start();
}
$_SESSION['last_activity'] = time();

// Session fixation prevention
if (!isset($_SESSION['created'])) {
    $_SESSION['created'] = time();
} else if (time() - $_SESSION['created'] > $session_timeout) {
    session_regenerate_id(true);
    $_SESSION['created'] = time();
}

// Login attempt tracking functions
function checkLoginAttempts($db, $email) {
    $stmt = $db->prepare("SELECT COUNT(*) as attempts FROM login_attempts WHERE email = ? AND attempt_time > DATE_SUB(NOW(), INTERVAL 5 MINUTE)");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['attempts'];
}

function logFailedAttempt($db, $email) {
    $stmt = $db->prepare("INSERT INTO login_attempts (email, attempt_time) VALUES (?, NOW())");
    $stmt->bind_param('s', $email);
    $stmt->execute();
}

function clearLoginAttempts($db, $email) {
    $stmt = $db->prepare("DELETE FROM login_attempts WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
}

// Secure user data retrieval
if (isset($_SESSION['email'])) {
    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        if ($stmt === false) {
            error_log('Failed to prepare statement: ' . $db->error);
            die('Database error occurred');
        }
        
        $stmt->bind_param('s', $_SESSION['email']);
        if (!$stmt->execute()) {
            error_log('Failed to execute statement: ' . $stmt->error);
            die('Database error occurred');
        }
        
        $result = $stmt->get_result();
        $userFetch = $result->fetch_assoc();
        $stmt->close();
        
    } catch (Exception $e) {
        error_log('User data retrieval failed: ' . $e->getMessage());
        die('Database error occurred');
    }
}
