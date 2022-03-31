<?php

declare(strict_types=1);

namespace Fridaycollective\Test\Paywithfriday\Lib;

use Mockery\MockInterface;
use Fridaycollective\Paywithfriday\Lib\Example;

class ExampleTest extends TestCase
{
    public function testGreet(): void
    {
        /** @var Example & MockInterface $example */
        $example = $this->mockery(Example::class);
        $example->shouldReceive('greet')->passthru();

        $this->assertSame('Hello, Friends!', $example->greet('Friends'));
    }
}
