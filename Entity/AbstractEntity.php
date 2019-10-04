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
 * Class AbstractEntity
 */
abstract class AbstractEntity
{
    /** @var int */
    protected $id;

    /** @var DateTime */
    protected $createdAt;

    public function __construct()
    {
        $this->id = Uuid::uuid4()->toString();
        $this->createdAt = new DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
}
