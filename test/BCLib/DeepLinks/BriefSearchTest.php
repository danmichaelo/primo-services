<?php
namespace BCLib\DeepLinks;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-08-03 at 13:40:39.
 */
class BriefSearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BriefSearch
     */
    protected $object;

    public function setUp()
    {
        $this->object = new BriefSearch();
    }

    public function testEmptySearchRequestReturnsCorrectly()
    {
        $expected = 'http://bc-primo.hosted.exlibrisgroup.com/primo_library/libweb/action/dlSearch.do?institution=BCL&vid=bclib&onCampus=true&group=GUEST';
        $this->assertEquals($expected, (string) $this->object);
    }

    public function testScopeSetCorrectly()
    {

    }
}
