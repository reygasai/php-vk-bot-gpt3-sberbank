<?php

namespace Main;

class System
{
    public const VERSION = "5.120";

    public const NEW_MESSAGE = "message_new";

    public const BOT_ALIASES = [
        "blognrey",
        "!кот"
    ];

    public const BOT_ALIAS_MAIN = "[club134101351|@blognrey]";

    public static function getApiToken()
    {
        return $_ENV['API_TOKEN'];
    }
}
