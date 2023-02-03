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

class LinkGroup
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
     * Details about the operations available in this version.
     *
     * @var SimpleLink
     */
    protected $header;
    /**
     * @var int
     */
    protected $weight;
    /**
     * @var SimpleLink[]
     */
    protected $links;
    /**
     * @var LinkGroup[]
     */
    protected $groups;

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

    /**
     * Details about the operations available in this version.
     */
    public function getHeader(): SimpleLink
    {
        return $this->header;
    }

    /**
     * Details about the operations available in this version.
     */
    public function setHeader(SimpleLink $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;

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

    /**
     * @return SimpleLink[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * @param SimpleLink[] $links
     */
    public function setLinks(array $links): self
    {
        $this->initialized['links'] = true;
        $this->links = $links;

        return $this;
    }

    /**
     * @return LinkGroup[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @param LinkGroup[] $groups
     */
    public function setGroups(array $groups): self
    {
        $this->initialized['groups'] = true;
        $this->groups = $groups;

        return $this;
    }
}
