<?php

declare(strict_types=1);

namespace Lcobucci\JWT;

use DateTimeImmutable;
use InvalidArgumentException;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Token\Plain;

interface Builder
{
    /**
     * Appends a new audience.
     */
    public function permittedFor(string $audience): self;

    /**
     * Configures the expiration time.
     */
    public function expiresAt(DateTimeImmutable $expiration): self;

    /**
     * Configures the token id.
     */
    public function identifiedBy(string $id): self;

    /**
     * Configures the time that the token was issued.
     */
    public function issuedAt(DateTimeImmutable $issuedAt): self;

    /**
     * Configures the issuer.
     */
    public function issuedBy(string $issuer): self;

    /**
     * Configures the time before which the token cannot be accepted.
     */
    public function canOnlyBeUsedAfter(DateTimeImmutable $notBefore): self;

    /**
     * Configures the subject.
     */
    public function relatedTo(string $subject): self;

    /**
     * Configures a header item.
     *
     * @param mixed $value
     */
    public function withHeader(string $name, $value): self;

    /**
     * Configures a claim item.
     *
     * @param mixed $value
     *
     * @throws InvalidArgumentException When trying to set a registered claim.
     */
    public function withClaim(string $name, $value): self;

    /**
     * Returns a signed token to be used.
     */
    public function getToken(Signer $signer, Key $key): Plain;
}
