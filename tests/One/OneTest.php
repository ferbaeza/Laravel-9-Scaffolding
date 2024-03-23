<?php

namespace Tests\One;

use PHPUnit\Framework\TestCase;

class OneTest extends TestCase
{

    public function creaciondeCarpetas()
    {
        
    }

    public function testOne(): void
    {
        $fun = hello("Mundo");
        $this->assertEquals("Hello, Mundo!", $fun);
    }

    public function testTwo(): void
    {
        $fun = palabraCapitalizada("mundo");
        $this->assertEquals("Mundo", $fun);
    }

    public function testThree(): void
    {
        $fun = minusculas("Mundo");
        $this->assertEquals("mundo", $fun);
    }
}
