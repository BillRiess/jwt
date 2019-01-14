<?php

declare(strict_types=1);

namespace Lcobucci\JWT\Signer\Ecdsa;

/**
 * Manipulates the result of a ECDSA signature (points R and S) according to the
 * JWA specs.
 *
 * @internal
 *
 * @see https://tools.ietf.org/html/rfc7518#page-9
 */
interface PointsManipulator
{
    /**
     * Converts the signature generated by OpenSSL into what JWA defines.
     */
    public function fromEcPoint(string $signature, int $length): string;

    /**
     * Converts the JWA signature into something OpenSSL understands.
     */
    public function toEcPoint(string $points, int $length): string;
}
