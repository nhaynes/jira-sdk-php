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

class DashboardGadgetUpdateRequest
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The title of the gadget.
     *
     * @var string
     */
    protected $title;
    /**
     * The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
     *
     * @var string
     */
    protected $color;
    /**
     * The position of the gadget.
     *
     * @var DashboardGadgetUpdateRequestPosition
     */
    protected $position;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The title of the gadget.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * The title of the gadget.
     */
    public function setTitle(string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    /**
     * The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
     */
    public function setColor(string $color): self
    {
        $this->initialized['color'] = true;
        $this->color = $color;

        return $this;
    }

    /**
     * The position of the gadget.
     */
    public function getPosition(): DashboardGadgetUpdateRequestPosition
    {
        return $this->position;
    }

    /**
     * The position of the gadget.
     */
    public function setPosition(DashboardGadgetUpdateRequestPosition $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;

        return $this;
    }
}
