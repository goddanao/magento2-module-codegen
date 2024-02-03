<?php

/**
 * Copyright © 2023 Lingaro sp. z o.o. All rights reserved.
 * See LICENSE for license details.
 */

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

define('BP', dirname(__DIR__));

use Lingaro\Magento2Codegen\Application;
use Lingaro\Magento2Codegen\Kernel;

$kernel = new Kernel('dev', true);
$kernel->boot();

$container = $kernel->getContainer();
/** @var Application $application */
$application = $container->get(Application::class);
$application->run();
