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

class CustomFieldOptionUpdate
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the custom field option.
     *
     * @var string
     */
    protected $id;
    /**
     * The value of the custom field option.
     *
     * @var string
     */
    protected $value;
    /**
     * Whether the option is disabled.
     *
     * @var bool
     */
    protected $disabled;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the custom field option.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the custom field option.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

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

    /**
     * Whether the option is disabled.
     */
    public function getDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * Whether the option is disabled.
     */
    public function setDisabled(bool $disabled): self
    {
        $this->initialized['disabled'] = true;
        $this->disabled = $disabled;

        return $this;
    }
}
