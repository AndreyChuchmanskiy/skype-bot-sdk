<?php
namespace SkypeBot\Command;

use SkypeBot\Api\Api;
use SkypeBot\Config;
use SkypeBot\DataProvider\TokenProvider;
use SkypeBot\Entity\AccessToken;
use SkypeBot\SkypeBot;

class Authenticate extends AnonymousCommand
{

    protected $appId;
    protected $appSecret;
    protected $authenticateEndpoint;
    protected $authScope;

    public function __construct() {
        $config = SkypeBot::getInstance()->getConfig();
        $this->appId = $config->getAppId();
        $this->appSecret = $config->getAppSecret();
        $this->authenticateEndpoint = $config->getAuthEndpoint();
        $this->authScope = $config->getAuthScope();
    }

    /**
     * @return Api
     */
    public function getApi()
    {
        return new Api(
            $this->authenticateEndpoint,
            array (
                Api::PARAM_PARAMS => array(
                    'grant_type' => 'client_credentials',
                    'scope' => $this->authScope,
                    'client_id' => $this->appId,
                    'client_secret' => $this->appSecret
                ),
                Api::PARAM_HEADERS => array(
                    'Content-Type: application/x-www-form-urlencoded'
                )
            )
        );
    }

    public function processResult($result)
    {
        SkypeBot::getInstance()->getTokenProvider()->saveToken(new AccessToken($result));
    }
}