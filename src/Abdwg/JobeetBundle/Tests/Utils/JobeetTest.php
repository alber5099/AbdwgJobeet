<?php
/**
 * Created by PhpStorm.
 * User: alber
 * Date: 2014/6/25
 * Time: 下午 6:54
 */
// src\Abdwg\JobeetBundle\Tests\Utils\JobeetTest.php
use Abdwg\JobeetBundle\Utils\Jobeet;
class JobeetTest extends \PHPUnit_Framework_TestCase
{
    public function testSlugify()
    {
        $this->assertEquals('sensio', Jobeet::slugify('Sensio'));
        $this->assertEquals('sensio-labs', Jobeet::slugify('sensio labs'));
        $this->assertEquals('sensio-labs', Jobeet::slugify('sensio labs'));
        $this->assertEquals('paris-france', Jobeet::slugify('paris,france'));
        $this->assertEquals('sensio', Jobeet::slugify(' sensio'));
        $this->assertEquals('sensio', Jobeet::slugify('sensio '));
        $this->assertEquals('n-a', Jobeet::slugify('-'));
//        if (function_exists('iconv')) {
//            $this->assertEquals('developpeur-web', Jobeet::slugify('Développeur Web'));
//        }
    }
}
