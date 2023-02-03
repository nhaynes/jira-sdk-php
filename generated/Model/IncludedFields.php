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

class IncludedFields
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var string[]
     */
    protected $actuallyIncluded;
    /**
     * @var string[]
     */
    protected $excluded;
    /**
     * @var string[]
     */
    protected $included;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * @return string[]
     */
    public function getActuallyIncluded(): array
    {
        return $this->actuallyIncluded;
    }

    /**
     * @param string[] $actuallyIncluded
     */
    public function setActuallyIncluded(array $actuallyIncluded): self
    {
        $this->initialized['actuallyIncluded'] = true;
        $this->actuallyIncluded = $actuallyIncluded;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getExcluded(): array
    {
        return $this->excluded;
    }

    /**
     * @param string[] $excluded
     */
    public function setExcluded(array $excluded): self
    {
        $this->initialized['excluded'] = true;
        $this->excluded = $excluded;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getIncluded(): array
    {
        return $this->included;
    }

    /**
     * @param string[] $included
     */
    public function setIncluded(array $included): self
    {
        $this->initialized['included'] = true;
        $this->included = $included;

        return $this;
    }
}
