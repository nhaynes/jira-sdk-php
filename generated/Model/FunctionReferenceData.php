<?php

namespace JiraSdk\Model;

class FunctionReferenceData
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
     * The function identifier.
     *
     * @var string
     */
    protected $value;
    /**
     * The display name of the function.
     *
     * @var string
     */
    protected $displayName;
    /**
     * Whether the function can take a list of arguments.
     *
     * @var string
     */
    protected $isList;
    /**
     * The data types returned by the function.
     *
     * @var string[]
     */
    protected $types;
    /**
     * The function identifier.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    /**
     * The function identifier.
     *
     * @param string $value
     *
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * The display name of the function.
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }
    /**
     * The display name of the function.
     *
     * @param string $displayName
     *
     * @return self
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Whether the function can take a list of arguments.
     *
     * @return string
     */
    public function getIsList(): string
    {
        return $this->isList;
    }
    /**
     * Whether the function can take a list of arguments.
     *
     * @param string $isList
     *
     * @return self
     */
    public function setIsList(string $isList): self
    {
        $this->initialized['isList'] = true;
        $this->isList = $isList;
        return $this;
    }
    /**
     * The data types returned by the function.
     *
     * @return string[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }
    /**
     * The data types returned by the function.
     *
     * @param string[] $types
     *
     * @return self
     */
    public function setTypes(array $types): self
    {
        $this->initialized['types'] = true;
        $this->types = $types;
        return $this;
    }
}
