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

class FunctionReferenceData
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The function identifier.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The function identifier.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * The display name of the function.
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * The display name of the function.
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Whether the function can take a list of arguments.
     */
    public function getIsList(): string
    {
        return $this->isList;
    }

    /**
     * Whether the function can take a list of arguments.
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
     */
    public function setTypes(array $types): self
    {
        $this->initialized['types'] = true;
        $this->types = $types;

        return $this;
    }
}
