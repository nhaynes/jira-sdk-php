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

class FoundGroup
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the group. The name of a group is mutable, to reliably identify a group use ``groupId`.`.
     *
     * @var string
     */
    protected $name;
    /**
     * The group name with the matched query string highlighted with the HTML bold tag.
     *
     * @var string
     */
    protected $html;
    /**
     * @var GroupLabel[]
     */
    protected $labels;
    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
     *
     * @var string
     */
    protected $groupId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the group. The name of a group is mutable, to reliably identify a group use ``groupId`.`.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the group. The name of a group is mutable, to reliably identify a group use ``groupId`.`.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The group name with the matched query string highlighted with the HTML bold tag.
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * The group name with the matched query string highlighted with the HTML bold tag.
     */
    public function setHtml(string $html): self
    {
        $this->initialized['html'] = true;
        $this->html = $html;

        return $this;
    }

    /**
     * @return GroupLabel[]
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param GroupLabel[] $labels
     */
    public function setLabels(array $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }

    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
     */
    public function setGroupId(string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;

        return $this;
    }
}
