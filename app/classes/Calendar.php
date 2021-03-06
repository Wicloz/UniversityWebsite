<?php
class Calendar {
    private static function getClient () {
        $scopes = implode(' ', array(Google_Service_Calendar::CALENDAR));
        $client = new Google_Client();
        $client->setApplicationName('s1704362\'s Study Website');
        $client->setScopes($scopes);
        $client->setAuthConfigFile('app/config/client_secret.json');
        $client->setAccessType('offline');
        return $client;
    }

    public static function isReady () {
        $credentialsPath = 'storage/google-calendar/'.Users::currentData()->student_id.'-credentials.json';
        return Users::loggedIn() && Users::currentData()->calendar_assignments && file_exists($credentialsPath);
    }

    public static function getService () {
        if (Users::loggedIn()) {
            $credentialsPath = 'storage/google-calendar/'.Users::currentData()->student_id.'-credentials.json';
            if (file_exists($credentialsPath)) {
                $client = self::getClient();
                $accessToken = file_get_contents($credentialsPath);
                $client->setAccessToken($accessToken);

                // Refresh the token if it's expired.
                if ($client->isAccessTokenExpired()) {
                  $client->refreshToken($client->getRefreshToken());
                  file_put_contents($credentialsPath, $client->getAccessToken());
                }

                $service = new Google_Service_Calendar($client);
                return $service;
            }
        }
        return false;
    }

    public static function setCredentials ($authCode = '') {
        if (Users::loggedIn()) {
            $credentialsPath = 'storage/google-calendar/'.Users::currentData()->student_id.'-credentials.json';
            $client = self::getClient();

            // Exchange authorization code for an access token.
            $accessToken = $client->authenticate($authCode);

            // Store the credentials to disk.
            if(!file_exists(dirname($credentialsPath))) {
                mkdir(dirname($credentialsPath));
                chmod(dirname($credentialsPath), 0700);
            }
            if(!file_exists(dirname($credentialsPath).'/index.php')) {
                file_put_contents(dirname($credentialsPath).'/index.php', '<?php?>');
            }
            file_put_contents($credentialsPath, $accessToken);

            return self::getService() == true;
        }
        return false;
    }

    public static function deleteCredentials () {
        if (Users::loggedIn()) {
            $credentialsPath = 'storage/google-calendar/'.Users::currentData()->student_id.'-credentials.json';
            unlink($credentialsPath);
        }
    }

    public static function getAuthUrl () {
        if (Users::loggedIn()) {
            $client = self::getClient();
            return $client->createAuthUrl();
        }
        return '';
    }

    public static function updateAssignment ($id) {
        $assignment = Queries::assignmentWithId($id);
        if (Users::loggedIn() && !empty($assignment) && self::isReady()) {
            $service = self::getService();
            $eventId = Users::currentData()->student_id.'assignment'.$assignment->id;
            $calendarId = Users::currentData()->calendar_assignments;

            $state = $assignment->completion ? '[DONE] ' : '';

            $request = new Google_Service_Calendar_Event(array(
                'id' => $eventId,
                'summary' => $state.$assignment->desc_short,
                'start' => array(
                    'date' => $assignment->end_date,
                    'timeZone' => 'Europe/Amsterdam'
                ),
                'end' => array(
                    'date' => $assignment->end_date,
                    'timeZone' => 'Europe/Amsterdam'
                )
            ));

            try {
                $event = $service->events->get($calendarId, $eventId);
                $service->events->update($calendarId, $eventId, $request);
            }
            catch (Exception $e) {
                $service->events->insert($calendarId, $request);
            }

            Notifications::addSuccess('Google calendar event updated!');
        }
    }

    public static function deleteAssignment ($id) {
        if (Users::loggedIn() && self::isReady()) {
            $service = self::getService();
            $eventId = Users::currentData()->student_id.'assignment'.$id;
            $calendarId = Users::currentData()->calendar_assignments;
            $service->events->delete($calendarId, $eventId);
            Notifications::addSuccess('Google calendar event deleted!');
        }
    }
}
?>
