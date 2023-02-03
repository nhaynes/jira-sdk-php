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

class Avatars
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * System avatars list.
     *
     * @var Avatar[]
     */
    protected $system;
    /**
     * Custom avatars list.
     *
     * @var Avatar[]
     */
    protected $custom;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * System avatars list.
     *
     * @return Avatar[]
     */
    public function getSystem(): array
    {
        return $this->system;
    }

    /**
     * System avatars list.
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
     * Custom avatars list.
     *
     * @return Avatar[]
     */
    public function getCustom(): array
    {
        return $this->custom;
    }

    /**
     * Custom avatars list.
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
