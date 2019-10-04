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
        $treeBuilder = new TreeBuilder('amorvan_aws');
        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('get_arn_ios')->defaultValue('arn:aws:sns:us-east-1:123456789012:app/APNS/my-app-ios')->end()
                ->scalarNode('get_arn_android')->defaultValue('arn:aws:sns:us-east-1:123456789012:app/APNS/my-app-android')->end()
                ->scalarNode('topic_arn_broadcast')->defaultValue('arn:aws:sns:us-east-1:123456789012:app/APNS/my-app-android')->end()
            ->end()
            ;

        return $treeBuilder;
    }
}
