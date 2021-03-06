<?php

declare(strict_types=1);

namespace Yiisoft\Yii\Queue\Event;

use Yiisoft\Yii\Queue\Job\JobInterface;
use Yiisoft\Yii\Queue\Queue;

final class BeforePush
{
    private bool $stop = false;
    private Queue $queue;
    private JobInterface $job;

    public function __construct(Queue $queue, JobInterface $job)
    {
        $this->queue = $queue;
        $this->job = $job;
    }

    public function getJob(): JobInterface
    {
        return $this->job;
    }

    public function getQueue(): Queue
    {
        return $this->queue;
    }

    public function isExecutionStopped(): bool
    {
        return $this->stop;
    }

    public function stopExecution(): void
    {
        $this->stop = true;
    }
}
