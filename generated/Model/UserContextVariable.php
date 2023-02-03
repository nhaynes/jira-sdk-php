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

class UserContextVariable extends CustomContextVariable
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The account ID of the user.
     *
     * @var string
     */
    protected $accountId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The account ID of the user.
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * The account ID of the user.
     */
    public function setAccountId(string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;

        return $this;
    }
}
