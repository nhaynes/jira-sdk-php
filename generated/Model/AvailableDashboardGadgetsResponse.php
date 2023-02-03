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

class AvailableDashboardGadgetsResponse
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of available gadgets.
     *
     * @var AvailableDashboardGadget[]
     */
    protected $gadgets;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of available gadgets.
     *
     * @return AvailableDashboardGadget[]
     */
    public function getGadgets(): array
    {
        return $this->gadgets;
    }

    /**
     * The list of available gadgets.
     *
     * @param AvailableDashboardGadget[] $gadgets
     */
    public function setGadgets(array $gadgets): self
    {
        $this->initialized['gadgets'] = true;
        $this->gadgets = $gadgets;

        return $this;
    }
}
