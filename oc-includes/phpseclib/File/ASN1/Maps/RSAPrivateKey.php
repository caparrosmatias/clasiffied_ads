<?php

/**
 * RSAPrivateKey
 *
 * PHP version 5
 *
 * @category  File
 * @package   ASN1
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2016 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib\File\ASN1\Maps;

use phpseclib\File\ASN1;

/**
 * RSAPrivateKey
 *
 * @package ASN1
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class RSAPrivateKey
{
    // version must be multi if otherPrimeInfos present
    const MAP = [
        'type' => ASN1::TYPE_SEQUENCE,
        'children' => [
            'version' => [
                'type' => ASN1::TYPE_INTEGER,
                'mapping' => ['two-prime', 'multi']
            ],
            'modulus' =>         ['type' => ASN1::TYPE_INTEGER], // n
            'publicExponent' =>  ['type' => ASN1::TYPE_INTEGER], // e
            'privateExponent' => ['type' => ASN1::TYPE_INTEGER], // d
            'prime1' =>          ['type' => ASN1::TYPE_INTEGER], // p
            'prime2' =>          ['type' => ASN1::TYPE_INTEGER], // q
            'exponent1' =>       ['type' => ASN1::TYPE_INTEGER], // d mod (p-1)
            'exponent2' =>       ['type' => ASN1::TYPE_INTEGER], // d mod (q-1)
            'coefficient' =>     ['type' => ASN1::TYPE_INTEGER], // (inverse of q) mod p
            'otherPrimeInfos' => OtherPrimeInfos::MAP + ['optional' => true]
        ]
    ];
}
