<?php

$client = new Google\Client();
$client->setAuthConfig('client_secret_43161991761-h60kkqsk7e5ipjavo8577asa1mr2okqs.apps.googleusercontent.com.json');
$client->addScope(
    array(
        "https://www.googleapis.com/auth/calendar.readonly",
        "https://www.googleapis.com/auth/calendar",
        "https://www.googleapis.com/auth/calendar.events.readonly",
        "https://www.googleapis.com/auth/calendar.events"
    )
);
$client->setRedirectUri('http://localhost/test/googleCalendarAPI/index.php');
$client->setAccessType('offline');        // offline access
$client->setIncludeGrantedScopes(true);   // incremental auth

if (!isset($_COOKIE['access_token']) && !$_COOKIE['access_token']) {
    $redirect_uri = 'http://localhost/test/googleCalendarAPI/oauth2callback.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    exit;
}

$client->setAccessToken(json_decode($_COOKIE['access_token'], true));
$service = new Google\Service\Calendar($client);
