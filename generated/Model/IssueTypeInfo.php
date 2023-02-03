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

class IssueTypeInfo
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue type.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the issue type.
     *
     * @var string
     */
    protected $name;
    /**
     * The avatar of the issue type.
     *
     * @var int
     */
    protected $avatarId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue type.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the issue type.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the issue type.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue type.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The avatar of the issue type.
     */
    public function getAvatarId(): int
    {
        return $this->avatarId;
    }

    /**
     * The avatar of the issue type.
     */
    public function setAvatarId(int $avatarId): self
    {
        $this->initialized['avatarId'] = true;
        $this->avatarId = $avatarId;

        return $this;
    }
}
