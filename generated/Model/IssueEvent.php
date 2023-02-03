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

class IssueEvent
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the event.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the event.
     *
     * @var string
     */
    protected $name;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the event.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the event.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the event.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the event.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }
}
