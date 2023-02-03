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

class CustomFieldContextDefaultValueDate extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The default date in ISO format. Ignored if `useCurrent` is true.
     *
     * @var string
     */
    protected $date;
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
     * The default date in ISO format. Ignored if `useCurrent` is true.
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * The default date in ISO format. Ignored if `useCurrent` is true.
     */
    public function setDate(string $date): self
    {
        $this->initialized['date'] = true;
        $this->date = $date;

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
