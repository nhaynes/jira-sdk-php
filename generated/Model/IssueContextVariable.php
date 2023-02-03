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

class IssueContextVariable extends CustomContextVariable
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The issue ID.
     *
     * @var int
     */
    protected $id;
    /**
     * The issue key.
     *
     * @var string
     */
    protected $key;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The issue ID.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The issue ID.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The issue key.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The issue key.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }
}
