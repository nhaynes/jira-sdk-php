<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class UnrestrictedUserEmail extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The accountId of the user.
     *
     * @var string
     */
    protected $accountId;
    /**
     * The email of the user.
     *
     * @var string
     */
    protected $email;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The accountId of the user.
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * The accountId of the user.
     */
    public function setAccountId(string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * The email of the user.
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * The email of the user.
     */
    public function setEmail(string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }
}
