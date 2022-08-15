<?php declare(strict_types=1);

namespace Y0x54a\Oid;

interface OidInterface extends StringableInterface
{
  /**
   * @return string
   */
  public function getId(): string;

  /**
   * @return int
   */
  public function getTimestamp(): int;

  /**
   * @return int
   */
  public function getRandom(): int;

  /**
   * @return int
   */
  public function getIndex(): int;
}