<?php
namespace BCLib\LaravelHelpers;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013-07-05 at 01:33:43.
 */
class TruncatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Truncator
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Truncator;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers BCLib\LaravelHelpers\Truncator::truncate
     */
    public function testTruncateDoesntTruncateShortString()
    {
        $string = "Foo is bar";
        $this->assertEquals($string, Truncator::truncate($string,30));
    }

    /**
     * @covers BCLib\LaravelHelpers\Truncator::truncate
     */
    public function testTruncateTruncateLongString()
    {
        $string = "Foobar is foobar is foobar";
        $expected = "Foobar is foobar is...";
        $this->assertEquals($expected, Truncator::truncate($string,20));
    }
}
