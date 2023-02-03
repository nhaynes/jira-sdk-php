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

class Status extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Whether the item is resolved. If set to "true", the link to the issue is displayed in a strikethrough font, otherwise the link displays in normal font.
     *
     * @var bool
     */
    protected $resolved;
    /**
     * Details of the icon representing the status. If not provided, no status icon displays in Jira.
     *
     * @var StatusIcon
     */
    protected $icon;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Whether the item is resolved. If set to "true", the link to the issue is displayed in a strikethrough font, otherwise the link displays in normal font.
     */
    public function getResolved(): bool
    {
        return $this->resolved;
    }

    /**
     * Whether the item is resolved. If set to "true", the link to the issue is displayed in a strikethrough font, otherwise the link displays in normal font.
     */
    public function setResolved(bool $resolved): self
    {
        $this->initialized['resolved'] = true;
        $this->resolved = $resolved;

        return $this;
    }

    /**
     * Details of the icon representing the status. If not provided, no status icon displays in Jira.
     */
    public function getIcon(): StatusIcon
    {
        return $this->icon;
    }

    /**
     * Details of the icon representing the status. If not provided, no status icon displays in Jira.
     */
    public function setIcon(StatusIcon $icon): self
    {
        $this->initialized['icon'] = true;
        $this->icon = $icon;

        return $this;
    }
}
