<?php

// function __construct()
// {
//     // Service account based client creation.
//     $this->client = new Google_Client();
//     $this->client->setApplicationName("Redu");
//     $this->client->setAuthConfig(CREDENTIALS_PATH);
//     $this->client->setScopes([SCOPES]);
//     $this->client->setSubject('redu@gmail.com');
//     $this->client->setAccessType('offline');

//     $this->service = new Google_Service_Calendar($this->client);
// }



require('vendor/autoload.php');



define('CREDENTIALS_PATH', __DIR__ . '/redu_service_account_credentials.json');
define('SCOPES', Google_Service_Calendar::CALENDAR);

function createNewCalendar($userName)
{
    //Service account based client creation. 
    $client = new Google\Client();
    $client->setApplicationName("REdu");
    // path to the credentials file obtained upon creating key for service account
    $client->setAuthConfig(CREDENTIALS\PATH);
    $client->setScopes([SCOPES]);
    $client->setSubject('redu@gmail.com');
    $client->setAccessType('offline');

    $service = new Google\Service\Calendar($client);

    $calendar = new Google\Service\Calendar\Calendar();
    $calendar->setSummary($userName);
    $calendar->setTimeZone('America/Los_Angeles');

    $createdCalendar = $service->calendars->insert($calendar);

    // Make the newly created calendar public
    $rule = new Google_Service_Calendar_AclRule();
    $scope = new Google_Service_Calendar_AclRuleScope();

    $scope->setType("default");
    $scope->setValue("");
    $rule->setScope($scope);
    $rule->setRole("reader");

    // Make the calendar public
    $createdRule = $service->acl->insert($createdCalendar->getId(), $rule);
    return $createdCalendar->getId();
}
