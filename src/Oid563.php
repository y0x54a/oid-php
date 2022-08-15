<?php declare(strict_types=1);

namespace Y0x54a\Oid;

class Oid563 extends AbstractOid
{
  /**
   * @var array
   */
  protected static $generatedRandom;

  /**
   * @var int
   */
  protected static $generatedIndex;

  /**
   * @param string|OidInterface $id
   * @return bool
   */
  public static function validate($id): bool{
    if ($id instanceof OidInterface) {
      $id = $id->getId();
    }
    return (bool)preg_match('/^[0-9a-f]{28}$/', $id);
  }

  /**
   * @param int $timestamp
   * @return string
   */
  public static function generate(int $timestamp): string{
    $id = '';
    $random = static::generateRandom();
    $index = static::generateIndex();
    /* 5-byte time */
    $id .= static::$hexmap[(int)($timestamp / (0xffffffff + 1)) & 0xff];
    $id .= static::$hexmap[($timestamp >> 24) & 0xff];
    $id .= static::$hexmap[($timestamp >> 16) & 0xff];
    $id .= static::$hexmap[($timestamp >> 8) & 0xff];
    $id .= static::$hexmap[$timestamp & 0xff];
    /* 6-byte random */
    $id .= static::$hexmap[$random[1]];
    $id .= static::$hexmap[$random[2]];
    $id .= static::$hexmap[$random[3]];
    $id .= static::$hexmap[$random[4]];
    $id .= static::$hexmap[$random[5]];
    $id .= static::$hexmap[$random[6]];
    /* 3-byte index */
    $id .= static::$hexmap[($index >> 16) & 0xff];
    $id .= static::$hexmap[($index >> 8) & 0xff];
    $id .= static::$hexmap[$index & 0xff];
    return $id;
  }

  /**
   * @return array
   */
  protected static function generateRandom(): array{
    if (static::$generatedRandom === null) {
      static::$generatedRandom = unpack('C*', random_bytes(6));
    }
    return static::$generatedRandom;
  }

  /**
   * @return int
   */
  protected static function generateIndex(): int{
    if (static::$generatedIndex === null) {
      static::$generatedIndex = random_int(0, 0xffffff);
    }
    return static::$generatedIndex = (static::$generatedIndex + 1) % 0xffffff;
  }
}