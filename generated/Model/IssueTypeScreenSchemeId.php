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

class IssueTypeScreenSchemeId
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue type screen scheme.
     *
     * @var string
     */
    protected $id;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue type screen scheme.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue type screen scheme.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }
}
