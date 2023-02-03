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

class ScreenableField
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the screen tab field.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the screen tab field. Required on create and update. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $name;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the screen tab field.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the screen tab field.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the screen tab field. Required on create and update. The maximum length is 255 characters.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the screen tab field. Required on create and update. The maximum length is 255 characters.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }
}
