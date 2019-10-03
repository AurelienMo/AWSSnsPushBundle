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

namespace Amorvan\AwsSnsPushBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        if (\method_exists(TreeBuilder::class, '__construct')) {
            $treeBuilder = new TreeBuilder('aws', 'variable');
        } else { // which is not the case for older versions
            $treeBuilder = new TreeBuilder;
            $treeBuilder->root('aws', 'variable');
        }
        return $treeBuilder;
    }
}
