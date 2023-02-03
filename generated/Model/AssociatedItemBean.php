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

class AssociatedItemBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the associated record.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the associated record.
     *
     * @var string
     */
    protected $name;
    /**
     * The type of the associated record.
     *
     * @var string
     */
    protected $typeName;
    /**
     * The ID of the associated parent record.
     *
     * @var string
     */
    protected $parentId;
    /**
     * The name of the associated parent record.
     *
     * @var string
     */
    protected $parentName;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the associated record.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the associated record.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the associated record.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the associated record.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The type of the associated record.
     */
    public function getTypeName(): string
    {
        return $this->typeName;
    }

    /**
     * The type of the associated record.
     */
    public function setTypeName(string $typeName): self
    {
        $this->initialized['typeName'] = true;
        $this->typeName = $typeName;

        return $this;
    }

    /**
     * The ID of the associated parent record.
     */
    public function getParentId(): string
    {
        return $this->parentId;
    }

    /**
     * The ID of the associated parent record.
     */
    public function setParentId(string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * The name of the associated parent record.
     */
    public function getParentName(): string
    {
        return $this->parentName;
    }

    /**
     * The name of the associated parent record.
     */
    public function setParentName(string $parentName): self
    {
        $this->initialized['parentName'] = true;
        $this->parentName = $parentName;

        return $this;
    }
}
