<?php 
// evästeiden asetukset ja määräykset
// evästeeteiden käyttö tarkoitus on saada käyttäjältä tarvittavat aloitus tiedot
// session start


ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

// set session parameters
session_set_cookie_params([
    'lifetime' => 0, // Cookie expires when the browser is closed
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);


session_start();



function regenerate_session_id_loggedin() {
    if (isset($_SESSION["user_id"])) {
        session_regenerate_id(true);
        $userId = $_SESSION["user_id"];
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $userId;
        session_id($sessionId);
        $_SESSION["last_regeneration"] = time();
    }
}

// function to regenerate session ID for non-logged-in users
function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

// function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// function to log out (destroy session)
function logout() {
    session_destroy();
    // optionally unset any session variables you may have set
    // unset($_SESSION['user_id']);
    // unset($_SESSION['last_regeneration']);
}
