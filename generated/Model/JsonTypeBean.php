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

class JsonTypeBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The data type of the field.
     *
     * @var string
     */
    protected $type;
    /**
     * When the data type is an array, the name of the field items within the array.
     *
     * @var string
     */
    protected $items;
    /**
     * If the field is a system field, the name of the field.
     *
     * @var string
     */
    protected $system;
    /**
     * If the field is a custom field, the URI of the field.
     *
     * @var string
     */
    protected $custom;
    /**
     * If the field is a custom field, the custom ID of the field.
     *
     * @var int
     */
    protected $customId;
    /**
     * If the field is a custom field, the configuration of the field.
     *
     * @var mixed[]
     */
    protected $configuration;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The data type of the field.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The data type of the field.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * When the data type is an array, the name of the field items within the array.
     */
    public function getItems(): string
    {
        return $this->items;
    }

    /**
     * When the data type is an array, the name of the field items within the array.
     */
    public function setItems(string $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;

        return $this;
    }

    /**
     * If the field is a system field, the name of the field.
     */
    public function getSystem(): string
    {
        return $this->system;
    }

    /**
     * If the field is a system field, the name of the field.
     */
    public function setSystem(string $system): self
    {
        $this->initialized['system'] = true;
        $this->system = $system;

        return $this;
    }

    /**
     * If the field is a custom field, the URI of the field.
     */
    public function getCustom(): string
    {
        return $this->custom;
    }

    /**
     * If the field is a custom field, the URI of the field.
     */
    public function setCustom(string $custom): self
    {
        $this->initialized['custom'] = true;
        $this->custom = $custom;

        return $this;
    }

    /**
     * If the field is a custom field, the custom ID of the field.
     */
    public function getCustomId(): int
    {
        return $this->customId;
    }

    /**
     * If the field is a custom field, the custom ID of the field.
     */
    public function setCustomId(int $customId): self
    {
        $this->initialized['customId'] = true;
        $this->customId = $customId;

        return $this;
    }

    /**
     * If the field is a custom field, the configuration of the field.
     *
     * @return mixed[]
     */
    public function getConfiguration(): iterable
    {
        return $this->configuration;
    }

    /**
     * If the field is a custom field, the configuration of the field.
     *
     * @param mixed[] $configuration
     */
    public function setConfiguration(iterable $configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;

        return $this;
    }
}
