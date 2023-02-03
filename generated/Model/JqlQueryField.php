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

class JqlQueryField
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the field.
     *
     * @var string
     */
    protected $name;
    /**
     * When the field refers to a value in an entity property, details of the entity property value.
     *
     * @var JqlQueryFieldEntityProperty[]
     */
    protected $property;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the field.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the field.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * When the field refers to a value in an entity property, details of the entity property value.
     *
     * @return JqlQueryFieldEntityProperty[]
     */
    public function getProperty(): array
    {
        return $this->property;
    }

    /**
     * When the field refers to a value in an entity property, details of the entity property value.
     *
     * @param JqlQueryFieldEntityProperty[] $property
     */
    public function setProperty(array $property): self
    {
        $this->initialized['property'] = true;
        $this->property = $property;

        return $this;
    }
}
