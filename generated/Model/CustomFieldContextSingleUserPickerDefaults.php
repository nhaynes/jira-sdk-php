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

class CustomFieldContextSingleUserPickerDefaults extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the context.
     *
     * @var string
     */
    protected $contextId;
    /**
     * The ID of the default user.
     *
     * @var string
     */
    protected $accountId;
    /**
     * Filter for a User Picker (single) custom field.
     *
     * @var UserFilter
     */
    protected $userFilter;
    /**
     * @var string
     */
    protected $type;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the context.
     */
    public function getContextId(): string
    {
        return $this->contextId;
    }

    /**
     * The ID of the context.
     */
    public function setContextId(string $contextId): self
    {
        $this->initialized['contextId'] = true;
        $this->contextId = $contextId;

        return $this;
    }

    /**
     * The ID of the default user.
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * The ID of the default user.
     */
    public function setAccountId(string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * Filter for a User Picker (single) custom field.
     */
    public function getUserFilter(): UserFilter
    {
        return $this->userFilter;
    }

    /**
     * Filter for a User Picker (single) custom field.
     */
    public function setUserFilter(UserFilter $userFilter): self
    {
        $this->initialized['userFilter'] = true;
        $this->userFilter = $userFilter;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }
}
