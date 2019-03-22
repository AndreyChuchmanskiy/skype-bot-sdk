<?php

namespace SkypeBot;

class Config
{
    private $appId;
    private $appSecret;
    private $authEndpoint = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';
    private $apiEndpoint = 'https://smba.trafficmanager.net/apis';
    private $openIdEndpoint = 'https://api.aps.skype.com';
    private $authScope = 'https://api.botframework.com/.default';

    /**
     * Config constructor.
     * @param string $appId
     * @param string $appSecret
     * @param string $authEndpoint
     * @param string $apiEndpoint
     * @param string $openIdEndpoint
     * @param string $authScope
     */
    public function  __construct($appId, $appSecret, $apiEndpoint = null, $authEndpoint = null, $openIdEndpoint = null, $authScope = null)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
        if ($authEndpoint) {
            $this->authEndpoint = $authEndpoint;
        }
        if ($apiEndpoint) {
            $this->apiEndpoint = $apiEndpoint;
        }
        if ($openIdEndpoint) {
            $this->openIdEndpoint = $openIdEndpoint;
        }
        if ($authScope) {
            $this->authScope = $authScope;
        }
    }

    public function getAppId()
    {
        return $this->appId;
    }

    public function getAppSecret()
    {
        return $this->appSecret;
    }

    public function getAuthEndpoint()
    {
        return $this->authEndpoint;
    }

    public function getApiEndpoint()
    {
        return $this->apiEndpoint;
    }

    public function getOpenIdEndpoint()
    {
        return $this->openIdEndpoint;
    }

    public function getAuthScope()
    {
        return $this->authScope;
    }
}