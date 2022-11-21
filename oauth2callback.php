<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();

$client = new Google\Client();
$client->setAuthConfig('client_secret_43161991761-h60kkqsk7e5ipjavo8577asa1mr2okqs.apps.googleusercontent.com.json');
$client->setRedirectUri('http://localhost/test/googleCalendarAPI/oauth2callback.php');
$client->addScope(
    array(
        "https://www.googleapis.com/auth/calendar.readonly",
        "https://www.googleapis.com/auth/calendar"
    )
);
if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $access_token = $client->getAccessToken();
    setcookie("access_token", json_encode($access_token), time() + 3600, "/");
    $redirect_uri = 'http://localhost/test/googleCalendarAPI/';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
