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

class CustomFieldContextDefaultValueMultipleVersionPicker extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The IDs of the default versions.
     *
     * @var string[]
     */
    protected $versionIds;
    /**
     * The order the pickable versions are displayed in. If not provided, the released-first order is used. Available version orders are `"releasedFirst"` and `"unreleasedFirst"`.
     *
     * @var string
     */
    protected $versionOrder;
    /**
     * @var string
     */
    protected $type;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The IDs of the default versions.
     *
     * @return string[]
     */
    public function getVersionIds(): array
    {
        return $this->versionIds;
    }

    /**
     * The IDs of the default versions.
     *
     * @param string[] $versionIds
     */
    public function setVersionIds(array $versionIds): self
    {
        $this->initialized['versionIds'] = true;
        $this->versionIds = $versionIds;

        return $this;
    }

    /**
     * The order the pickable versions are displayed in. If not provided, the released-first order is used. Available version orders are `"releasedFirst"` and `"unreleasedFirst"`.
     */
    public function getVersionOrder(): string
    {
        return $this->versionOrder;
    }

    /**
     * The order the pickable versions are displayed in. If not provided, the released-first order is used. Available version orders are `"releasedFirst"` and `"unreleasedFirst"`.
     */
    public function setVersionOrder(string $versionOrder): self
    {
        $this->initialized['versionOrder'] = true;
        $this->versionOrder = $versionOrder;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }
}
