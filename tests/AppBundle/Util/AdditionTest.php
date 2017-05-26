<?php
/**
 * Created by PhpStorm.
 * User: bdai
 * Date: 26/05/2017
 * Time: 15:42
 */

namespace tests\AppBundle\Util;


use AppBundle\Util\Addition;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class AdditionTest extends TestCase
{

    public function testAddTwo()
    {
        $calc = new Addition();
        $result = $calc->addTwo(30);
        $this->assertEquals(32, $result);
    }
}