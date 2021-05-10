<?php

namespace Main;

class Helper
{
    public static function getClearText($message)
    {
        return str_replace(array_merge([System::BOT_ALIAS_MAIN], System::BOT_ALIASES), "", $message);
    }

    public static function buildTriggerExpression()
    {
        $buildString = "";

        foreach (System::BOT_ALIASES as $alias) {
            if(System::BOT_ALIASES[0] === $alias) {
                $buildString .= "^" . $alias;
                continue;
            }

            $buildString .= "|^" . $alias;
        }

        return "/({$buildString})/i";
    }

    public static function isBotCalled($message)
    {
        $expression = strripos($message, System::BOT_ALIAS_MAIN);

        if($expression !== false && $expression === 0) {
            return true;
        } else {
            return (preg_match(self::buildTriggerExpression(), $message));
        }
    }
}
