<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueMultipleOption extends \ArrayObject
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
     * The ID of the context.
     *
     * @var string
     */
    protected $contextId;
    /**
     * The list of IDs of the default options.
     *
     * @var string[]
     */
    protected $optionIds;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     * The ID of the context.
     *
     * @return string
     */
    public function getContextId(): string
    {
        return $this->contextId;
    }
    /**
     * The ID of the context.
     *
     * @param string $contextId
     *
     * @return self
     */
    public function setContextId(string $contextId): self
    {
        $this->initialized['contextId'] = true;
        $this->contextId = $contextId;
        return $this;
    }
    /**
     * The list of IDs of the default options.
     *
     * @return string[]
     */
    public function getOptionIds(): array
    {
        return $this->optionIds;
    }
    /**
     * The list of IDs of the default options.
     *
     * @param string[] $optionIds
     *
     * @return self
     */
    public function setOptionIds(array $optionIds): self
    {
        $this->initialized['optionIds'] = true;
        $this->optionIds = $optionIds;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     *
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
