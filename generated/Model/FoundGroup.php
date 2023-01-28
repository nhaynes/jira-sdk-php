<?php

namespace JiraSdk\Model;

class FoundGroup
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
     * The name of the group. The name of a group is mutable, to reliably identify a group use ``groupId`.`
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
     *
     *
     * @var GroupLabel[]
     */
    protected $labels;
    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
     *
     * @var string
     */
    protected $groupId;
    /**
     * The name of the group. The name of a group is mutable, to reliably identify a group use ``groupId`.`
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the group. The name of a group is mutable, to reliably identify a group use ``groupId`.`
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The group name with the matched query string highlighted with the HTML bold tag.
     *
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }
    /**
     * The group name with the matched query string highlighted with the HTML bold tag.
     *
     * @param string $html
     *
     * @return self
     */
    public function setHtml(string $html): self
    {
        $this->initialized['html'] = true;
        $this->html = $html;
        return $this;
    }
    /**
     *
     *
     * @return GroupLabel[]
     */
    public function getLabels(): array
    {
        return $this->labels;
    }
    /**
     *
     *
     * @param GroupLabel[] $labels
     *
     * @return self
     */
    public function setLabels(array $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
     *
     * @return string
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }
    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
     *
     * @param string $groupId
     *
     * @return self
     */
    public function setGroupId(string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
        return $this;
    }
}
