<?php

namespace JiraSdk\Model;

class SimpleLink
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     *
     *
     * @var string
     */
    protected $id;
    /**
     *
     *
     * @var string
     */
    protected $styleClass;
    /**
     *
     *
     * @var string
     */
    protected $iconClass;
    /**
     *
     *
     * @var string
     */
    protected $label;
    /**
     *
     *
     * @var string
     */
    protected $title;
    /**
     *
     *
     * @var string
     */
    protected $href;
    /**
     *
     *
     * @var int
     */
    protected $weight;
    /**
     *
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     *
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getStyleClass(): string
    {
        return $this->styleClass;
    }
    /**
     *
     *
     * @param string $styleClass
     *
     * @return self
     */
    public function setStyleClass(string $styleClass): self
    {
        $this->initialized['styleClass'] = true;
        $this->styleClass = $styleClass;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getIconClass(): string
    {
        return $this->iconClass;
    }
    /**
     *
     *
     * @param string $iconClass
     *
     * @return self
     */
    public function setIconClass(string $iconClass): self
    {
        $this->initialized['iconClass'] = true;
        $this->iconClass = $iconClass;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }
    /**
     *
     *
     * @param string $label
     *
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     *
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }
    /**
     *
     *
     * @param string $href
     *
     * @return self
     */
    public function setHref(string $href): self
    {
        $this->initialized['href'] = true;
        $this->href = $href;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }
    /**
     *
     *
     * @param int $weight
     *
     * @return self
     */
    public function setWeight(int $weight): self
    {
        $this->initialized['weight'] = true;
        $this->weight = $weight;
        return $this;
    }
}
