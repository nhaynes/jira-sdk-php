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

class CustomFieldOption
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of these custom field option details.
     *
     * @var string
     */
    protected $self;
    /**
     * The value of the custom field option.
     *
     * @var string
     */
    protected $value;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of these custom field option details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of these custom field option details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The value of the custom field option.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The value of the custom field option.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
