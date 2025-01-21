<?php

namespace App;

class Mail
{
    protected(set) bool $isSent = false;
    protected string $template = 'default';
    protected string $from = 'from@test.com';
    protected string $to;
    protected string|null $cc = null;
    protected string|null $bcc = null;
    protected string|null $subject = null;
    protected string|null $body = null;
    protected array $attachments = [];

    public static function make(): self
    {
        return new self;
    }

    public function template(string $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function from(string $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function to(string $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function cc(string $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    public function bcc(string $bcc): self
    {
        $this->bcc = $bcc;

        return $this;
    }

    public function subject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function body(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function attach(string ...$attachment): self
    {
        $this->attachments = array_merge($this->attachments, $attachment);

        return $this;
    }

    public function send(bool $force = false): self
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

        return $this;
    }
}
