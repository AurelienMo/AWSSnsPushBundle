# Amorvan - AWSSnsPushBundle

The purpose of this bundle is manage mobile push notification with AWS Sns service. Bundle provides many services to following :
- Subscribe device to broadcast topic
- Create a temporary topic
- Subscribe device to specific temp topic
- Unsubscribe device from broadcast or specific topic
- Send mobile push notification with custom message & additional parameters

## Prerequisites

This bundles requires Symfony 3.4+ or 4.3+.

## Installation

### Step 1 - Download the Bundle
```
composer require amorvan/aws-sns-push-bundle
```
### Step 2 - Enable Bundles (Amorvan/AWSSnsPushBundle & AWS SDK)

#### Symfony 3 Version :
Register bundle into `app/AppKernel.php`:
```
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Aws\Symfony\AwsBundle(),
            new Amorvan\AwsSnsPushBundle\AmorvanAwsSnsPushBundle(),
        );
    }

    // ...
}
```

#### Symfony 4 version :
Register bundle into `config/bundles.php`:
```
return [
    //...
    Aws\Symfony\AwsBundle::class => ['all' => true],
    Amorvan\AwsSnsPushBundle\AmorvanAwsSnsPushBundle::class => ['all' => true],
];
```

### Step 3 - Create entity `Device` and `LogHistoricPush`
```
//Device entity
<?php

namespace YOUR_NAME_SPACE_ENTITY;

use Amorvan\AwsSnsPushBundle\Model\AbstractDeviceModel;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Device
 *
 * @ORM\Table(name="YOUR_TABLE_NAME")
 * @ORM\Entity()
 */
class Device extends AbstractDeviceModel
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @ORM\Id()
     */
    protected $id;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $deviceType;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $deviceId;

    /**
     * @var UserInterface|null
     *
     * @ORM\ManyToOne(targetEntity="FQCN_ENTITY_USER")
     * @ORM\JoinColumn(name="FK_NAME", referencedColumnName="id", nullable=true)
     */
    protected $user;
}
```
```
//LogHistoricPush entity
<?php

namespace YOUR_NAME_SPACE_ENTITY;

use Amorvan\AwsSnsPushBundle\Model\AbstractLogHistoricPush;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class LogHistoricPush
 *
 * @ORM\Table(name="amo_log_historic_push")
 * @ORM\Entity()
 */
class LogHistoricPush extends AbstractLogHistoricPush
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @ORM\Id()
     */
    protected $id;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $message;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $pushsNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $topicArn;
}
```
### Step 4 - Update database Schema

#### Use Doctrine schema update
`bin/console doctrine:schema:update --force`
#### Use Migrations Doctrine
`bin/console doctrine:migrations:diff`

`bin/console doctrine:migrations:migrate`

### Step 5 - Configure Bundle
