<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Instinct\Component\Kernel\Tests\Fixtures;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Instinct\Component\Kernel\Kernel;

class KernelWithoutBundles extends Kernel
{
    public function registerBundles()
    {
        return [];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
    }

    public function getProjectDir()
    {
        return __DIR__;
    }

    protected function build(ContainerBuilder $container)
    {
        $container->setParameter('test_executed', true);
    }
}