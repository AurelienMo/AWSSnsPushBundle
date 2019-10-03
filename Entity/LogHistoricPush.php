<?php

declare(strict_types=1);

/*
 * This file is part of AWSSnsPushBundle
 *
 * (c) Aurelien Morvan <morvan.aurelien@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Amorvan\AwsSnsPushBundle\Entity;

use DateTime;
use Ramsey\Uuid\Uuid;

/**
 * Class LogHistoricPush
 */
class LogHistoricPush
{
    const LIST_PUSH = [

    ];

    /** @var int */
    protected $id;

    /** @var DateTime */
    protected $createdAt;

    /** @var string */
    protected $type;

    /** @var string */
    protected $message;

    /** @var int */
    protected $pushsNumber;

    /** @var string */
    protected $topicArn;

    public function __construct(
        string $type,
        string $message,
        int $pushsNumber,
        string $topicArn
    ) {
        $this->type = $type;
        $this->message = $message;
        $this->pushsNumber = $pushsNumber;
        $this->topicArn = $topicArn;
        $this->id = Uuid::uuid4()->toString();
        $this->createdAt = new DateTime();
    }
}
