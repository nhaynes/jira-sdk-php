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

class ProjectAvatars
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * List of avatars included with Jira. These avatars cannot be deleted.
     *
     * @var Avatar[]
     */
    protected $system;
    /**
     * List of avatars added to Jira. These avatars may be deleted.
     *
     * @var Avatar[]
     */
    protected $custom;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * List of avatars included with Jira. These avatars cannot be deleted.
     *
     * @return Avatar[]
     */
    public function getSystem(): array
    {
        return $this->system;
    }

    /**
     * List of avatars included with Jira. These avatars cannot be deleted.
     *
     * @param Avatar[] $system
     */
    public function setSystem(array $system): self
    {
        $this->initialized['system'] = true;
        $this->system = $system;

        return $this;
    }

    /**
     * List of avatars added to Jira. These avatars may be deleted.
     *
     * @return Avatar[]
     */
    public function getCustom(): array
    {
        return $this->custom;
    }

    /**
     * List of avatars added to Jira. These avatars may be deleted.
     *
     * @param Avatar[] $custom
     */
    public function setCustom(array $custom): self
    {
        $this->initialized['custom'] = true;
        $this->custom = $custom;

        return $this;
    }
}
