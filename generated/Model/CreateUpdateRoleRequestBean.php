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

class CreateUpdateRoleRequestBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the project role. Must be unique. Cannot begin or end with whitespace. The maximum length is 255 characters. Required when creating a project role. Optional when partially updating a project role.
     *
     * @var string
     */
    protected $name;
    /**
     * A description of the project role. Required when fully updating a project role. Optional when creating or partially updating a project role.
     *
     * @var string
     */
    protected $description;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the project role. Must be unique. Cannot begin or end with whitespace. The maximum length is 255 characters. Required when creating a project role. Optional when partially updating a project role.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the project role. Must be unique. Cannot begin or end with whitespace. The maximum length is 255 characters. Required when creating a project role. Optional when partially updating a project role.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * A description of the project role. Required when fully updating a project role. Optional when creating or partially updating a project role.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * A description of the project role. Required when fully updating a project role. Optional when creating or partially updating a project role.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }
}
