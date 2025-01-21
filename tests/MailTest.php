<?php

use App\Mail;

test('An email can be sent with fluent', function () {
    $mail = Mail::make()
        ->to('to@test.com')
        ->subject('Test message')
        ->body('This is the email body')
        ->attach('test.png', 'test.pdf')
        ->send();

    expect($mail)->toBeInstanceOf(Mail::class)
        ->and($mail->isSent)->toBeTrue();
});

test('An email cannot be sent twice if not forced', function () {
    $mail = Mail::make()
        ->to('to@test.com')
        ->subject('Test message')
        ->body('This is the email body')
        ->attach('test.png', 'test.pdf')
        ->send();

    expect($mail->isSent)->toBeTrue();

    $mail->send(); // This will throw an exception
})->throws(DomainException::class, 'Mail is already sent');
