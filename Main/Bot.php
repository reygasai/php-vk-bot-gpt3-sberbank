<?php

namespace Main;

use Main\Helper;
use Main\System;
use Requests\Sberbank;
use DigitalStars\SimpleVK\LongPoll;

class Bot
{
    private $bot;

    public function __construct()
    {
        $this->bot = LongPoll::create(System::getApiToken(), System::VERSION);
    }

    public function run()
    {
        $bot = $this->bot;

        $this->bot->listen(function () use ($bot) {
           $bot->initVars($peerID, $userID, $messageType, $message);

           if($messageType === System::NEW_MESSAGE && Helper::isBotCalled($message)) {
                $requestText = Helper::getClearText($message);

                $sberbank = new Sberbank();
                $response = $sberbank->question($requestText);

                if(strlen($response) > 0) {
                    $bot->msg($response)->send();
                }
           }
        });
    }
}
