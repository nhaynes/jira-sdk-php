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

class Screen
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the screen.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the screen.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the screen.
     *
     * @var string
     */
    protected $description;
    /**
     * The scope of the screen.
     *
     * @var ScreenScope
     */
    protected $scope;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the screen.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the screen.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the screen.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the screen.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the screen.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the screen.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The scope of the screen.
     */
    public function getScope(): ScreenScope
    {
        return $this->scope;
    }

    /**
     * The scope of the screen.
     */
    public function setScope(ScreenScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }
}
