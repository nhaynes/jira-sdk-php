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

class UpdatePriorityDetails extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the priority. Must be unique.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the priority.
     *
     * @var string
     */
    protected $description;
    /**
     * The URL of an icon for the priority. Accepted protocols are HTTP and HTTPS. Built in icons can also be used.
     *
     * @var string
     */
    protected $iconUrl;
    /**
     * The status color of the priority in 3-digit or 6-digit hexadecimal format.
     *
     * @var string
     */
    protected $statusColor;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the priority. Must be unique.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the priority. Must be unique.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the priority.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the priority.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The URL of an icon for the priority. Accepted protocols are HTTP and HTTPS. Built in icons can also be used.
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    /**
     * The URL of an icon for the priority. Accepted protocols are HTTP and HTTPS. Built in icons can also be used.
     */
    public function setIconUrl(string $iconUrl): self
    {
        $this->initialized['iconUrl'] = true;
        $this->iconUrl = $iconUrl;

        return $this;
    }

    /**
     * The status color of the priority in 3-digit or 6-digit hexadecimal format.
     */
    public function getStatusColor(): string
    {
        return $this->statusColor;
    }

    /**
     * The status color of the priority in 3-digit or 6-digit hexadecimal format.
     */
    public function setStatusColor(string $statusColor): self
    {
        $this->initialized['statusColor'] = true;
        $this->statusColor = $statusColor;

        return $this;
    }
}
