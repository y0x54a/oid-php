<?php declare(strict_types=1);

namespace Y0x54a\Oid;

// @codeCoverageIgnoreStart
if (PHP_VERSION_ID >= 80000) {
  interface StringableInterface extends \Stringable{}
} else {
  interface StringableInterface{}
}
// @codeCoverageIgnoreEnd