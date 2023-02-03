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

class ProjectIssueSecurityLevels
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Issue level security items list.
     *
     * @var SecurityLevel[]
     */
    protected $levels;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Issue level security items list.
     *
     * @return SecurityLevel[]
     */
    public function getLevels(): array
    {
        return $this->levels;
    }

    /**
     * Issue level security items list.
     *
     * @param SecurityLevel[] $levels
     */
    public function setLevels(array $levels): self
    {
        $this->initialized['levels'] = true;
        $this->levels = $levels;

        return $this;
    }
}
