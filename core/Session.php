<?php

namespace app\core;

class Session
{

    protected const FLASH_KEY = 'flash_message';

    public function __construct()
    {
        session_start();
        $flashMessage = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessage as $key => &$flashMessage) {
            $flashMessage['remove'] = true;
        }
    }

    public function setFlashMessage($key, $message)
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }

    public function getFlashMessage($key)
    {
    }

    public function __destruct()
    {
        $flashMessage = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessage as $key => &$flashMessage) {
            if ($flashMessage['remove']) {
                unset($flashMessage[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessage;
    }
}
