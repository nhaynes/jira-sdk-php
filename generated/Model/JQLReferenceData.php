<?php

namespace JiraSdk\Model;

class JQLReferenceData
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
     * List of fields usable in JQL queries.
     *
     * @var FieldReferenceData[]
     */
    protected $visibleFieldNames;
    /**
     * List of functions usable in JQL queries.
     *
     * @var FunctionReferenceData[]
     */
    protected $visibleFunctionNames;
    /**
     * List of JQL query reserved words.
     *
     * @var string[]
     */
    protected $jqlReservedWords;
    /**
     * List of fields usable in JQL queries.
     *
     * @return FieldReferenceData[]
     */
    public function getVisibleFieldNames(): array
    {
        return $this->visibleFieldNames;
    }
    /**
     * List of fields usable in JQL queries.
     *
     * @param FieldReferenceData[] $visibleFieldNames
     *
     * @return self
     */
    public function setVisibleFieldNames(array $visibleFieldNames): self
    {
        $this->initialized['visibleFieldNames'] = true;
        $this->visibleFieldNames = $visibleFieldNames;
        return $this;
    }
    /**
     * List of functions usable in JQL queries.
     *
     * @return FunctionReferenceData[]
     */
    public function getVisibleFunctionNames(): array
    {
        return $this->visibleFunctionNames;
    }
    /**
     * List of functions usable in JQL queries.
     *
     * @param FunctionReferenceData[] $visibleFunctionNames
     *
     * @return self
     */
    public function setVisibleFunctionNames(array $visibleFunctionNames): self
    {
        $this->initialized['visibleFunctionNames'] = true;
        $this->visibleFunctionNames = $visibleFunctionNames;
        return $this;
    }
    /**
     * List of JQL query reserved words.
     *
     * @return string[]
     */
    public function getJqlReservedWords(): array
    {
        return $this->jqlReservedWords;
    }
    /**
     * List of JQL query reserved words.
     *
     * @param string[] $jqlReservedWords
     *
     * @return self
     */
    public function setJqlReservedWords(array $jqlReservedWords): self
    {
        $this->initialized['jqlReservedWords'] = true;
        $this->jqlReservedWords = $jqlReservedWords;
        return $this;
    }
}
