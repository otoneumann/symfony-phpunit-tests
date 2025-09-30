<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class NotificationServiceTest extends TestCase
{
    public function testNotificationIsSent(): void
    {
        $mailer = $this->createStub(Mailer::class);

        $mailer->method('sendEmail')->willReturn(true);
        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('a@a.a', 'Hello'));
    }

    public function testSendThrowException(): void
    {
        $mailer = $this->createStub(Mailer::class);

        $mailer->method('sendEmail')->willReturn(new RuntimeException('Something went wrong'));

        $service = new NotificationService($mailer);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Something went wrong');

        $service->sendNotification('a@a.a', 'Hello');

    }
}