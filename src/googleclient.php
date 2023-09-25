<?php
require '../vendor/autoload.php';

use Google\Client;
use Google\Service\Oauth2 as ServiceOauth2; 
use Google\Service\Oauth2\Userinfo;
use GuzzleHttp\Client as GuzzleClient;

class GoogleClient {

    public Client $client;
    public UserInfo $data;

    /**
     * @throws \Google\Exception
     */
    public function __construct() {
        $this->client = new Client();
        $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/boca/index.php');
        $this->client->addScope('email');
        $this->client->addScope('profile');

        $guzzleClient = new GuzzleClient(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $this->client->setHttpClient($guzzleClient);
    }

    public function generateAuthUrl(): string
    {
        return $this->client->createAuthUrl();
    }

    public function authorized(): bool
    {
        if (isset($_GET['code'])) {
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->client->setAccessToken($token['access_token']);
            $googleService = new ServiceOauth2($this->client);

            $this->data = $googleService->userinfo->get();

            return $this->data->verifiedEmail;
        }
        return false;
    }

    public function logout($token=null): void
    {
        if ($token) {
            $this->client->revokeToken($token);
        } else {
            $this->client->revokeToken();
        }
    }
}

?>