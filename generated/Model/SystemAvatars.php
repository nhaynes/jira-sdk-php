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

class SystemAvatars
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of avatar details.
     *
     * @var Avatar[]
     */
    protected $system;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of avatar details.
     *
     * @return Avatar[]
     */
    public function getSystem(): array
    {
        return $this->system;
    }

    /**
     * A list of avatar details.
     *
     * @param Avatar[] $system
     */
    public function setSystem(array $system): self
    {
        $this->initialized['system'] = true;
        $this->system = $system;

        return $this;
    }
}
