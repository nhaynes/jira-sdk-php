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

class WorkflowIDs
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the workflow.
     *
     * @var string
     */
    protected $name;
    /**
     * The entity ID of the workflow.
     *
     * @var string
     */
    protected $entityId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the workflow.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the workflow.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The entity ID of the workflow.
     */
    public function getEntityId(): string
    {
        return $this->entityId;
    }

    /**
     * The entity ID of the workflow.
     */
    public function setEntityId(string $entityId): self
    {
        $this->initialized['entityId'] = true;
        $this->entityId = $entityId;

        return $this;
    }
}
