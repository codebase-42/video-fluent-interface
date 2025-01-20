<?php

use App\Mail;

test('An email can be sent', function () {
    $mail = new Mail(
        'default',
        'from@test.com',
        'to@test.com',
        null,
        null,
        'Test message',
        'This is the email body',
        ['test.png', 'test.pdf'],
    );

    $mail->send();

    expect($mail->isSent)->toBeTrue();
});

test('An email cannot be sent twice if not forced', function () {
    $mail = new Mail(
        'default',
        'from@test.com',
        'to@test.com',
        null,
        null,
        'Test message',
        'This is the email body',
        ['test.png', 'test.pdf'],
    );

    $mail->send();
    $mail->send();
})->throws(DomainException::class, 'Mail is already sent');
