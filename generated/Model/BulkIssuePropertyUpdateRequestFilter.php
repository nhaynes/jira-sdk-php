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

class BulkIssuePropertyUpdateRequestFilter extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * List of issues to perform the bulk operation on.
     *
     * @var int[]
     */
    protected $entityIds;
    /**
     * The value of properties to perform the bulk operation on.
     *
     * @var mixed
     */
    protected $currentValue;
    /**
     * Whether the bulk operation occurs only when the property is present on or absent from an issue.
     *
     * @var bool
     */
    protected $hasProperty;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * List of issues to perform the bulk operation on.
     *
     * @return int[]
     */
    public function getEntityIds(): array
    {
        return $this->entityIds;
    }

    /**
     * List of issues to perform the bulk operation on.
     *
     * @param int[] $entityIds
     */
    public function setEntityIds(array $entityIds): self
    {
        $this->initialized['entityIds'] = true;
        $this->entityIds = $entityIds;

        return $this;
    }

    /**
     * The value of properties to perform the bulk operation on.
     *
     * @return mixed
     */
    public function getCurrentValue()
    {
        return $this->currentValue;
    }

    /**
     * The value of properties to perform the bulk operation on.
     *
     * @param mixed $currentValue
     */
    public function setCurrentValue($currentValue): self
    {
        $this->initialized['currentValue'] = true;
        $this->currentValue = $currentValue;

        return $this;
    }

    /**
     * Whether the bulk operation occurs only when the property is present on or absent from an issue.
     */
    public function getHasProperty(): bool
    {
        return $this->hasProperty;
    }

    /**
     * Whether the bulk operation occurs only when the property is present on or absent from an issue.
     */
    public function setHasProperty(bool $hasProperty): self
    {
        $this->initialized['hasProperty'] = true;
        $this->hasProperty = $hasProperty;

        return $this;
    }
}
