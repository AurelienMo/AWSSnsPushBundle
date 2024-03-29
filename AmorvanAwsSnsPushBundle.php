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

namespace Amorvan\AwsSnsPushBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class AmorvanAwsSnsPushBundle
 */
class AmorvanAwsSnsPushBundle extends Bundle
{
    const VERSION = '1.0.0';

    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }
}
