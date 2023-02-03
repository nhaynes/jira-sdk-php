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

class AvailableDashboardGadget
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The module key of the gadget type.
     *
     * @var string
     */
    protected $moduleKey;
    /**
     * The URI of the gadget type.
     *
     * @var string
     */
    protected $uri;
    /**
     * The title of the gadget.
     *
     * @var string
     */
    protected $title;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The module key of the gadget type.
     */
    public function getModuleKey(): string
    {
        return $this->moduleKey;
    }

    /**
     * The module key of the gadget type.
     */
    public function setModuleKey(string $moduleKey): self
    {
        $this->initialized['moduleKey'] = true;
        $this->moduleKey = $moduleKey;

        return $this;
    }

    /**
     * The URI of the gadget type.
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * The URI of the gadget type.
     */
    public function setUri(string $uri): self
    {
        $this->initialized['uri'] = true;
        $this->uri = $uri;

        return $this;
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
}
