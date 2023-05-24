<?php

/**
 * Copyright © 2023 Lingaro sp. z o.o. All rights reserved.
 * See LICENSE for license details.
 */

declare(strict_types=1);

namespace Lingaro\Magento2Codegen\Service\StringFilter;

use function ucfirst;

class PascalCaseFilter extends CamelCaseFilter
{
    public function filter(string $text): string
    {
        return ucfirst(parent::filter($text));
    }
}
