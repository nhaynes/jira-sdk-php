<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueForgeDateTimeField extends \ArrayObject
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
     * The default date-time in ISO format. Ignored if `useCurrent` is true.
     *
     * @var string
     */
    protected $dateTime;
    /**
     * Whether to use the current date.
     *
     * @var bool
     */
    protected $useCurrent = false;
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
     * The default date-time in ISO format. Ignored if `useCurrent` is true.
     *
     * @return string
     */
    public function getDateTime(): string
    {
        return $this->dateTime;
    }
    /**
     * The default date-time in ISO format. Ignored if `useCurrent` is true.
     *
     * @param string $dateTime
     *
     * @return self
     */
    public function setDateTime(string $dateTime): self
    {
        $this->initialized['dateTime'] = true;
        $this->dateTime = $dateTime;
        return $this;
    }
    /**
     * Whether to use the current date.
     *
     * @return bool
     */
    public function getUseCurrent(): bool
    {
        return $this->useCurrent;
    }
    /**
     * Whether to use the current date.
     *
     * @param bool $useCurrent
     *
     * @return self
     */
    public function setUseCurrent(bool $useCurrent): self
    {
        $this->initialized['useCurrent'] = true;
        $this->useCurrent = $useCurrent;
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