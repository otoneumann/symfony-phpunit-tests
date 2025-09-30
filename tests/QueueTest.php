<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

final class QueueTest extends TestCase
{
    private Queue $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNewQueueIsEmpty(): void
    {
        $this->assertSame(0, $this->queue->getSize());
    }

    public function testPushAddsItem(): void
    {
        $this->queue->push('foo');
        $this->assertSame(1, $this->queue->getSize());
    }

    public function testPopRemovesAndReturnesItem(): void
    {
        $this->queue->push('foo');
        $this->assertSame('foo', $this->queue->pop());
        $this->assertSame(0, $this->queue->getSize());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue(): void
    {
        $this->queue->push('foo');
        $this->queue->push('bar');

        $this->assertSame('foo', $this->queue->pop());
    }

    public function testPopThrowsAnExceptionWhenQueueIsEmpty(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Cant pop empty queue');

        $this->queue->pop();
    }
}