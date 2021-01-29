<?php

declare(strict_types=1);

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Wuapaa\ContaoPrefillformsBundle\Tests;

use Wuapaa\ContaoPrefillformsBundle\ContaoPrefillformsBundle;
use PHPUnit\Framework\TestCase;

class ContaoPrefillformsBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new ContaoPrefillformsBundle();

        $this->assertInstanceOf('Wuapaa\ContaoPrefillformsBundle\ContaoPrefillformsBundle', $bundle);
    }
}
