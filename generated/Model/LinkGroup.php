<?php

namespace JiraSdk\Model;

class LinkGroup
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
     * Details about the operations available in this version.
     *
     * @var SimpleLink
     */
    protected $header;
    /**
     *
     *
     * @var int
     */
    protected $weight;
    /**
     *
     *
     * @var SimpleLink[]
     */
    protected $links;
    /**
     *
     *
     * @var LinkGroup[]
     */
    protected $groups;
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
     * Details about the operations available in this version.
     *
     * @return SimpleLink
     */
    public function getHeader(): SimpleLink
    {
        return $this->header;
    }
    /**
     * Details about the operations available in this version.
     *
     * @param SimpleLink $header
     *
     * @return self
     */
    public function setHeader(SimpleLink $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;
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
    /**
     *
     *
     * @return SimpleLink[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }
    /**
     *
     *
     * @param SimpleLink[] $links
     *
     * @return self
     */
    public function setLinks(array $links): self
    {
        $this->initialized['links'] = true;
        $this->links = $links;
        return $this;
    }
    /**
     *
     *
     * @return LinkGroup[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }
    /**
     *
     *
     * @param LinkGroup[] $groups
     *
     * @return self
     */
    public function setGroups(array $groups): self
    {
        $this->initialized['groups'] = true;
        $this->groups = $groups;
        return $this;
    }
}
