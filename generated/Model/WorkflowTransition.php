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

class WorkflowTransition
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The transition ID.
     *
     * @var int
     */
    protected $id;
    /**
     * The transition name.
     *
     * @var string
     */
    protected $name;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The transition ID.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The transition ID.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The transition name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The transition name.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }
}
