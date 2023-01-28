<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueCascadingOption extends \ArrayObject
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
     * The ID of the default option.
     *
     * @var string
     */
    protected $optionId;
    /**
     * The ID of the default cascading option.
     *
     * @var string
     */
    protected $cascadingOptionId;
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
     * The ID of the default option.
     *
     * @return string
     */
    public function getOptionId(): string
    {
        return $this->optionId;
    }
    /**
     * The ID of the default option.
     *
     * @param string $optionId
     *
     * @return self
     */
    public function setOptionId(string $optionId): self
    {
        $this->initialized['optionId'] = true;
        $this->optionId = $optionId;
        return $this;
    }
    /**
     * The ID of the default cascading option.
     *
     * @return string
     */
    public function getCascadingOptionId(): string
    {
        return $this->cascadingOptionId;
    }
    /**
     * The ID of the default cascading option.
     *
     * @param string $cascadingOptionId
     *
     * @return self
     */
    public function setCascadingOptionId(string $cascadingOptionId): self
    {
        $this->initialized['cascadingOptionId'] = true;
        $this->cascadingOptionId = $cascadingOptionId;
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
