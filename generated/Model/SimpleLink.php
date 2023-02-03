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

class SimpleLink
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $styleClass;
    /**
     * @var string
     */
    protected $iconClass;
    /**
     * @var string
     */
    protected $label;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $href;
    /**
     * @var int
     */
    protected $weight;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getStyleClass(): string
    {
        return $this->styleClass;
    }

    public function setStyleClass(string $styleClass): self
    {
        $this->initialized['styleClass'] = true;
        $this->styleClass = $styleClass;

        return $this;
    }

    public function getIconClass(): string
    {
        return $this->iconClass;
    }

    public function setIconClass(string $iconClass): self
    {
        $this->initialized['iconClass'] = true;
        $this->iconClass = $iconClass;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function setHref(string $href): self
    {
        $this->initialized['href'] = true;
        $this->href = $href;

        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->initialized['weight'] = true;
        $this->weight = $weight;

        return $this;
    }
}
