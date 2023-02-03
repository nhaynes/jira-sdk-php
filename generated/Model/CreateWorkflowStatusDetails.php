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

class CreateWorkflowStatusDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the status.
     *
     * @var string
     */
    protected $id;
    /**
     * The properties of the status.
     *
     * @var string[]
     */
    protected $properties;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the status.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the status.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The properties of the status.
     *
     * @return string[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }

    /**
     * The properties of the status.
     *
     * @param string[] $properties
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;

        return $this;
    }
}
