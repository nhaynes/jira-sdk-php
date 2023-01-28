<?php

namespace JiraSdk\Model;

class FieldLastUsed
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
     * Last used value type:
     *  *TRACKED*: field is tracked and a last used date is available.
     *  *NOT\_TRACKED*: field is not tracked, last used date is not available.
     *  *NO\_INFORMATION*: field is tracked, but no last used date is available.
     *
     * @var string
     */
    protected $type;
    /**
     * The date when the value of the field last changed.
     *
     * @var \DateTime
     */
    protected $value;
    /**
     * Last used value type:
     *  *TRACKED*: field is tracked and a last used date is available.
     *  *NOT\_TRACKED*: field is not tracked, last used date is not available.
     *  *NO\_INFORMATION*: field is tracked, but no last used date is available.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * Last used value type:
     *  *TRACKED*: field is tracked and a last used date is available.
     *  *NOT\_TRACKED*: field is not tracked, last used date is not available.
     *  *NO\_INFORMATION*: field is tracked, but no last used date is available.
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
    /**
     * The date when the value of the field last changed.
     *
     * @return \DateTime
     */
    public function getValue(): \DateTime
    {
        return $this->value;
    }
    /**
     * The date when the value of the field last changed.
     *
     * @param \DateTime $value
     *
     * @return self
     */
    public function setValue(\DateTime $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
