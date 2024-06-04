<?php

namespace SicrediAPI\Domain\Boleto;

class Messages
{
    private $maxLength = 90;
    private $maxMessages = 4;
    private $messages = [];

    public function __construct(array $messages = [])
    {
        if (count($messages) > $this->maxMessages) {
            throw new \InvalidArgumentException("Messages count must be less than {$this->maxMessages}");
        }

        foreach ($messages as $message) {
            if (strlen($message) > $this->maxLength) {
                throw new \InvalidArgumentException("Message length must be less than {$this->maxLength} characters");
            }
        }

        $this->messages = $messages;
    }

    public function getLines()
    {
        return $this->messages;
    }
}
