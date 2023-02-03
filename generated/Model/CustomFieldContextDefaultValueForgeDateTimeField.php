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

class CustomFieldContextDefaultValueForgeDateTimeField extends \ArrayObject
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
     * The default date-time in ISO format. Ignored if `useCurrent` is true.
     *
     * @var string
     */
    protected $dateTime;
    /**
     * Whether to use the current date.
     *
     * @var bool
     */
    protected $useCurrent = false;
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
     * The default date-time in ISO format. Ignored if `useCurrent` is true.
     */
    public function getDateTime(): string
    {
        return $this->dateTime;
    }

    /**
     * The default date-time in ISO format. Ignored if `useCurrent` is true.
     */
    public function setDateTime(string $dateTime): self
    {
        $this->initialized['dateTime'] = true;
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Whether to use the current date.
     */
    public function getUseCurrent(): bool
    {
        return $this->useCurrent;
    }

    /**
     * Whether to use the current date.
     */
    public function setUseCurrent(bool $useCurrent): self
    {
        $this->initialized['useCurrent'] = true;
        $this->useCurrent = $useCurrent;

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
