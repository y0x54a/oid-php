# oid-php
[![packagist](https://img.shields.io/packagist/v/y0x54a/oid-php)](https://packagist.org/packages/y0x54a/oid-php)
[![Build Status](https://github.com/y0x54a/oid-php/workflows/ci/badge.svg?branch=main)](https://github.com/y0x54a/oid-php/actions)
[![codecov](https://codecov.io/gh/y0x54a/oid-php/branch/main/graph/badge.svg?token=19XTYSRDLQ)](https://codecov.io/gh/y0x54a/oid-php)

## Installing
```sh
composer require y0x54a/oid-php
```

## Example
```php
use Y0x54a\Oid\Oid453;
use Y0x54a\Oid\Oid563;
```

```php
Oid453::create();
// 12-byte

Oid563::create();
// 14-byte
```

```php
$oid = new Oid453('00112233445566778899aabb');

$oid->getId();
// 00112233445566778899aabb

$oid->getTimestamp();
// 1122867

$oid->getRandom();
// 293490554760

$oid->getIndex();
// 10070715

$oid->__toString();
// 00112233445566778899aabb

Oid453::validate($oid);
// true

Oid453::validate($oid->getId());
// true

Oid453::validate('00112233445566778899AABB');
// false

Oid563::validate($oid);
// false
```

```php
$oid1 = Oid453::create(1122867);
$oid2 = Oid453::create($oid1);

$oid1->getId() === $oid2->getId();
// true

$oid1->getTimestamp();
// 1122867

$oid2->getTimestamp();
// 1122867

Oid453::generate(1122867);
// 00112233...
```

```php
$oid = new Oid563('00112233445566778899aabbccdd');

$oid->getId();
// 00112233445566778899aabbccdd

$oid->getTimestamp();
// 287454020

$oid->getRandom();
// 93898580466090

$oid->getIndex();
// 12307677

$oid->__toString();
// 00112233445566778899aabbccdd

Oid563::validate($oid);
// true

Oid563::validate($oid->getId());
// true

Oid563::validate('00112233445566778899AABBCCDD');
// false

Oid453::validate($oid);
// false
```

```php
$oid1 = Oid563::create(287454020);
$oid2 = Oid563::create($oid1);

$oid1->getId() === $oid2->getId();
// true

$oid1->getTimestamp();
// 287454020

$oid2->getTimestamp();
// 287454020

Oid563::generate(287454020);
// 0011223344...
```

## API

- ### OidInterface

  - **Methods**

  - `getId(): string`
  
  - `getTimestamp(): int`

  - `getRandom(): int`
  
  - `getIndex(): int`

  - `__toString(): string`

- ### Oid453

  - **Methods**

  - `__construct(string | OidInterface $id)`

  - `getId(): string`

  - `getTimestamp(): int`

  - `getRandom(): int`

  - `getIndex(): int`

  - `__toString(): string`

  - **Static Methods**

  - `create(string | OidInterface | int $id = null): Oid453`

  - `validate(string | OidInterface $id): bool`

  - `generate(int $timestamp): string`

- ### Oid563

  - **Methods**

  - `__construct(string | OidInterface $id)`

  - `getId(): string`

  - `getTimestamp(): int`

  - `getRandom(): int`

  - `getIndex(): int`

  - `__toString(): string`

  - **Static Methods**

  - `create(string | OidInterface | int $id = null): Oid563`

  - `validate(string | OidInterface $id): bool`

  - `generate(int $timestamp): string`