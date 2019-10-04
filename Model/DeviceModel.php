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
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Device
 */
class DeviceModel
{
    /** @var int */
    protected $id;

    /** @var DateTime */
    protected $createdAt;

    /** @var string */
    protected $deviceType;

    /** @var string */
    protected $deviceId;

    /** @var UserInterface|null */
    protected $user;

    /**
     * Device constructor.
     *
     * @param string             $deviceType
     * @param string             $deviceId
     * @param UserInterface|null $user
     */
    public function __construct(
        string $deviceType,
        string $deviceId,
        ?UserInterface $user = null
    ) {
        $this->deviceType = $deviceType;
        $this->deviceId = $deviceId;
        $this->user = $user;
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

    /**
     * @return string
     */
    public function getDeviceType(): string
    {
        return $this->deviceType;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * @return UserInterface|null
     */
    public function getUser(): ?UserInterface
    {
        return $this->user;
    }
}
