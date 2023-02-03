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

class IssueEntityProperties
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of entity property IDs.
     *
     * @var int[]
     */
    protected $entitiesIds;
    /**
     * A list of entity property keys and values.
     *
     * @var JsonNode[]
     */
    protected $properties;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of entity property IDs.
     *
     * @return int[]
     */
    public function getEntitiesIds(): array
    {
        return $this->entitiesIds;
    }

    /**
     * A list of entity property IDs.
     *
     * @param int[] $entitiesIds
     */
    public function setEntitiesIds(array $entitiesIds): self
    {
        $this->initialized['entitiesIds'] = true;
        $this->entitiesIds = $entitiesIds;

        return $this;
    }

    /**
     * A list of entity property keys and values.
     *
     * @return JsonNode[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }

    /**
     * A list of entity property keys and values.
     *
     * @param JsonNode[] $properties
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;

        return $this;
    }
}
