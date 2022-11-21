<?php
require_once  '../../vendor/autoload.php';

$client = new Google\Client();
$client->setAuthConfig('../../client_secret_43161991761-h60kkqsk7e5ipjavo8577asa1mr2okqs.apps.googleusercontent.com.json');
$client->addScope(
    array(
        "https://www.googleapis.com/auth/calendar"
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


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $details = $_POST['event_details'];
    $calendarId = $_POST['calendarId'];

    $event = array('summary' => $details['summary']); // event title

    // if event is an all day event or not 
    if ($details['all_day'] == 1) {
        $event['start'] = array('date' => $details['event_time']['event_date']);
        $event['end'] = array('date' => $details['event_time']['event_date']);
    } else {
        $event['start'] = array('dateTime' =>  $details['event_time']['start_time'], 'timeZone' => 'America/Los_Angeles');
        $event['end'] = array('dateTime' =>  $details['event_time']['end_time'], 'timeZone' => 'America/Los_Angeles');
    }

    // if event repeats or not
    if ($details['recurrence'] == 1) {
        // repeats weekly until XXXX
        // RRULE:FREQ=WEEKLY;UNTIL=XXXX

        $event['recurrence'] = array("RRULE:FREQ=WEEKLY;UNTIL=" . str_replace('-', '', $details['recurrence_end']) . ";");
    }

    $event = new Google\Service\Calendar\Event($event);

    $event = $service->events->insert($calendarId, $event);
    printf('Event created: %s\n', $event->htmlLink);
}
