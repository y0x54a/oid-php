<?php declare(strict_types=1);

namespace Y0x54aTest\Oid;

use Throwable;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Y0x54a\Oid\Oid453;

class Oid453Test extends TestCase
{
  protected $resources;

  protected function setUp(): void{
    $this->resources = require(__DIR__.'/resources.php');
  }

  public function testCreate(){
    $t = time();
    $oid = Oid453::create();
    $this->assertGreaterThanOrEqual($oid->getTimestamp(), $t);
  }

  public function testOutOfTimestamp(){
    $oid = Oid453::create(0xffffffff + 1);
    $this->assertEquals($oid->getTimestamp(), 0);
  }

  public function testValidInputs(){
    foreach ($this->resources['validOid453Inputs'] as $input){
      $oid1 = Oid453::create($input[0]);
      $this->assertEquals($oid1->getId(), $input[0]);
      $this->assertEquals($oid1->getTimestamp(), $input[1]);
      $this->assertEquals($oid1->getRandom(), $input[2]);
      $this->assertEquals($oid1->getIndex(), $input[3]);
      $this->assertEquals($oid1->__toString(), $input[0]);

      $oid2 = Oid453::create($oid1);
      $this->assertEquals($oid2->getId(), $oid1->getId());
      $this->assertEquals($oid2->getTimestamp(), $oid1->getTimestamp());
      $this->assertEquals($oid2->getRandom(), $oid1->getRandom());
      $this->assertEquals($oid2->getIndex(), $oid1->getIndex());
      $this->assertEquals($oid2->__toString(), $oid1->__toString());

      $oid3 = Oid453::create($input[1]);
      $this->assertEquals($oid3->getTimestamp(), $input[1]);
    }
  }

  public function testInvalidInputs(){
    foreach ($this->resources['invalidOid453Inputs'] as $input){
      try {
        Oid453::create($input);
      } catch (Throwable $e) {
        $this->assertInstanceOf(InvalidArgumentException::class, $e);
        continue;
      }
      $this->assertTrue(false);
    }
  }
}