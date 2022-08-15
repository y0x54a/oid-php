<?php return [
  'validOid453Inputs' => [
    ['000000000000000000000000', 0x00000000, 0x0000000000, 0x000000],
    ['00000000ffffffffffffffff', 0x00000000, 0xffffffffff, 0xffffff],
    ['ffffffffffffffffffffffff', 0xffffffff, 0xffffffffff, 0xffffff],
    ['00112233445566778899aabb', 0x00112233, 0x4455667788, 0x99aabb]
  ],
  
  'invalidOid453Inputs' => [
    '0000000000000000000000',
    'ffffffffffffffffffffffffff',
    'FF0000000000000000000000',
    'ffffffffffffffffffffffFF',
    'aabbccddeeffgghhiijjkkll',
    '00112233445566778899aabbccdd'
  ],

  'validOid563Inputs' => [
    ['0000000000000000000000000000', 0x0000000000, 0x000000000000, 0x000000],
    ['0000000000ffffffffffffffffff', 0x0000000000, 0xffffffffffff, 0xffffff],
    ['ffffffffffffffffffffffffffff', 0xffffffffff, 0xffffffffffff, 0xffffff],
    ['00112233445566778899aabbccdd', 0x0011223344, 0x5566778899aa, 0xbbccdd]
  ],

  'invalidOid563Inputs' => [
    '00000000000000000000000000',
    'ffffffffffffffffffffffffffffff',
    'FF00000000000000000000000000',
    'ffffffffffffffffffffffffffFF',
    'aabbccddeeffgghhiijjkkllmmnn',
    '00112233445566778899aabb'
  ]
];