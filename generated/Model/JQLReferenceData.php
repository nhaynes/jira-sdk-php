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

class JQLReferenceData
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setJqlReservedWords(array $jqlReservedWords): self
    {
        $this->initialized['jqlReservedWords'] = true;
        $this->jqlReservedWords = $jqlReservedWords;

        return $this;
    }
}
