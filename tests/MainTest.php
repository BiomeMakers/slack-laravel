<?php declare(strict_types=1);

namespace Tests;

final class MainTest extends TestCase {

    public function testOne(): void {
        $this->assertEquals(
            1+1,
            2
        );
    }
}
