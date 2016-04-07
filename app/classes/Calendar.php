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

    public static function getAuthorisedClient () {
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

                return $client;
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
              mkdir(dirname($credentialsPath), 0771, true);
            }
            file_put_contents($credentialsPath, $accessToken);
        }
    }
}
?>
