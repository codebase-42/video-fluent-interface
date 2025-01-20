<?php

namespace App;

class Mail
{
    protected(set) bool $isSent = false;

    public function __construct(
        protected string $template,
        protected string $from,
        protected string $to,
        protected string|null $cc = null,
        protected string|null $bcc = null,
        protected string|null $subject = null,
        protected string|null $body = null,
        protected array $attachments = [],
    )
    {

    }

    public function send(bool $force = false): void
    {
        if ($this->isSent && !$force) {
            throw new \DomainException('Mail is already sent.');
        }

        $this->isSent = true;

        echo PHP_EOL;
        echo 'Mail sent' . PHP_EOL;
        echo '---------------------------------------------' . PHP_EOL;
        echo 'Template: ' . $this->template . PHP_EOL;
        echo 'From: ' . $this->from . PHP_EOL;
        echo 'To: ' . $this->to . PHP_EOL;
        echo 'Cc: ' . $this->cc . PHP_EOL;
        echo 'Bcc: ' . $this->bcc . PHP_EOL;
        echo 'Subject: ' . $this->subject . PHP_EOL;
        echo 'Body: ' . $this->body . PHP_EOL;
        echo 'Attachments: ' . join(', ', $this->attachments) . PHP_EOL;
    }
}
