<?php

namespace Mikrotik\Exceptions;

use Throwable;
use function Couchbase\defaultDecoder;

class Exception extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if ($this->contains($message, 'failure:')) {
            $failureMessage = explode('failure:', $message);
            $failureMessage = $failureMessage[1];
            $message = $failureMessage;
        }
        parent::__construct($message, $code, $previous);
    }

    private function contains($text, $textToFind, $ignoreCase = false)
    {
        {
            if ($ignoreCase) {
                $text = strtolower($text);
                $textToFind = strtolower($textToFind);
            }
            $needlePos = strpos($text, $textToFind);
            return ($needlePos === false ? false : ($needlePos + 1));
        }
    }
}