<?php
$logFile = getenv('ERROR_LOG_FILE') ?: './errors.log';

if (!file_exists($logFile)) {
    $file = fopen($logFile, 'w');
    fclose($file);
}

$environment = getenv('ENVIRONMENT');

if ($environment === 'development') {
    ini_set('display_errors', '1'); // Don't display errors
    ini_set('log_errors', '1'); // Log errors
    ini_set('error_log', $logFile); // Specify the log file
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    ini_set('log_errors', '1'); // Log errors
    ini_set('error_log', $logFile); // Specify the log file
    // Don't report E_NOTICE, E_DEPRECATED, and E_STRICT errors in production
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
    // Set error handler
    set_error_handler("log_error");
}

// Define the error handler
function log_error($errno, $errstr, $errfile, $errline)
{
    // Log the error details to a file or a logging service
    $errorMessage = "Error: [$errno] $errstr - $errfile:$errline";
    error_log($errorMessage);

    // Show a generic error message to the user
    echo "An error occurred. Please try again later.";
}


$informatienognietafgemaakt = '<div class="Alert-sc-lrsio9-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="Alert___StyledIconInfo-sc-lrsio9-5 jcPVRX">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="12" y1="16" x2="12" y2="12"></line>
        <line x1="12" y1="8" x2="12.01" y2="8"></line>
    </svg>
    <h4 style="text-align:center;font-size:large;">Deze pagina is nog niet geheel werkend. Meld enige bugs bij Dishairano!</h4>
</div>';

if (file_exists(__DIR__ . '/.env')) {
    $envLines = explode("\n", file_get_contents(__DIR__ . '/.env'));
    foreach ($envLines as $envLine) {
        if (trim($envLine) !== '') {
            putenv(trim($envLine));
        }
    }
}

$database['user'] = getenv('DB_USER');
$database['password'] = getenv('DB_PASSWORD');
$database['database'] = getenv('DB_NAME');
$database['host'] = getenv('DB_HOST');

$db = new mysqli($database['host'], $database['user'], $database['password'], $database['database']);

$site = 'https://mijn.district-rijnmond.net';
// Saltgenerator
function generateUniqueSalt()
{
    return bin2hex(random_bytes(32));
}

function generateRandomString($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $string = NULL;
    for ($i = 0; $i < $length; $i++) {
        $string .= $chars[mt_rand(0, 61)];
    }
    return $string;
}

// Start the session
if (session_status() == PHP_SESSION_NONE) {
    // session has not started
    session_start();
}

session_regenerate_id(true);

ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');

// Check if the session is too old and timeout if necessary
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 1800) {
    // Last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['last_activity'] = time(); // update last activity time stamp

// Regenerate session ID to prevent session fixation attacks
if (!isset($_SESSION['created'])) {
    $_SESSION['created'] = time();
} else if (time() - $_SESSION['created'] > 1800) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['created'] = time();  // update creation time
}

// Your existing code
if (isset($_SESSION['email'])) {
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $userFetch = $result->fetch_assoc();
}