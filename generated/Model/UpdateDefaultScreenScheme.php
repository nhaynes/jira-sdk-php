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

class UpdateDefaultScreenScheme
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the screen scheme.
     *
     * @var string
     */
    protected $screenSchemeId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the screen scheme.
     */
    public function getScreenSchemeId(): string
    {
        return $this->screenSchemeId;
    }

    /**
     * The ID of the screen scheme.
     */
    public function setScreenSchemeId(string $screenSchemeId): self
    {
        $this->initialized['screenSchemeId'] = true;
        $this->screenSchemeId = $screenSchemeId;

        return $this;
    }
}
