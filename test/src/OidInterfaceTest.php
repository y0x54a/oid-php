<?php declare(strict_types=1);

namespace Y0x54aTest\Oid;

use ReflectionClass;
use PHPUnit\Framework\TestCase;
use Y0x54a\Oid\OidInterface;
use Y0x54a\Oid\StringableInterface;

class OidInterfaceTest extends TestCase
{
  public function testIsInterface(){
    $rc = new ReflectionClass(OidInterface::class);
    $this->assertTrue($rc->isInterface());
  }

  public function testIsSubclassOfStringableInterface(){
    $rc = new ReflectionClass(OidInterface::class);
    $this->assertTrue($rc->isSubclassOf(StringableInterface::class));
    if (PHP_VERSION_ID >= 80000) {
      $this->assertTrue($rc->isSubclassOf(\Stringable::class));
    }
  }
}