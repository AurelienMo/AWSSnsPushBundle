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

namespace Amorvan\AwsSnsPushBundle\DependencyInjection\Compiler;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class DoctrineCompilerPass
 */
final class DoctrineCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $config = $container->getExtensionConfig('aws')[0];
        if (!class_exists(DoctrineOrmMappingsPass::class) &&
            !isset($container['manager_type'])
        ) {
            return;
        }

        $mappingPass = $this->getORMCompilerPass($config);

        $mappingPass->process($container);
    }

    /**
     * @param array $config
     *
     * @return CompilerPassInterface
     */
    private function getORMCompilerPass(array $config): CompilerPassInterface
    {
        $nameSpace = 'Amorvan\AwsSnsPushBundle\Entity';
        $mappings = [
            realpath(dirname(dirname(__DIR__)).'/Resources/config/orm/doctrine-entity') => $nameSpace
        ];

        return DoctrineOrmMappingsPass::createYamlMappingDriver($mappings);
    }
}
