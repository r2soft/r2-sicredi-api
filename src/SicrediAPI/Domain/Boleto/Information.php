<?php

namespace SicrediAPI\Domain\Boleto;

class Information
{
    private $maxLength = 80;
    private $maxMessages = 5;
    private $messages = [];

    public function __construct(array $messages = [])
    {
        if (count($messages) > $this->maxMessages) {
            throw new \InvalidArgumentException("Messages count must be less than {$this->maxMessages}");
        }

        foreach ($messages as $key => $message) {
            if (trim($message) === '') {
                unset($messages[$key]);
            }
            if (strlen($message) > $this->maxLength) {
                throw new \InvalidArgumentException("Message length must be less than {$this->maxLength} characters");
            }
        }
        $this->messages = array_values($messages);
    }

    public function getLines()
    {
        return $this->messages;
    }
}
