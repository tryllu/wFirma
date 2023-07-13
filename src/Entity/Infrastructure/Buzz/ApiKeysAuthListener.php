<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Webit\WFirmaSDK\Auth\ApiKeysAuth;
use Buzz\Listener\ListenerInterface;
use Buzz\Message\MessageInterface;
use Buzz\Message\RequestInterface;

final class ApiKeysAuthListener implements ListenerInterface
{
    /** @var ApiKeysAuth */
    private $auth;

    public function __construct(ApiKeysAuth $auth)
    {
        $this->auth = $auth;
    }

    public function preSend(RequestInterface $request)
    {
        $request->addHeaders([
            'accessKey' => $this->auth->accessKey(),
            'secretKey' => $this->auth->secretKey(),
            'appKey' => $this->auth->appKey()
        ]);
    }

    public function postSend(RequestInterface $request, MessageInterface $response)
    {
    }
}