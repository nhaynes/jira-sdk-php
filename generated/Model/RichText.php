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

class RichText extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var bool
     */
    protected $finalised;
    /**
     * @var bool
     */
    protected $valueSet;
    /**
     * @var bool
     */
    protected $emptyAdf;
    /**
     * @var bool
     */
    protected $empty;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getFinalised(): bool
    {
        return $this->finalised;
    }

    public function setFinalised(bool $finalised): self
    {
        $this->initialized['finalised'] = true;
        $this->finalised = $finalised;

        return $this;
    }

    public function getValueSet(): bool
    {
        return $this->valueSet;
    }

    public function setValueSet(bool $valueSet): self
    {
        $this->initialized['valueSet'] = true;
        $this->valueSet = $valueSet;

        return $this;
    }

    public function getEmptyAdf(): bool
    {
        return $this->emptyAdf;
    }

    public function setEmptyAdf(bool $emptyAdf): self
    {
        $this->initialized['emptyAdf'] = true;
        $this->emptyAdf = $emptyAdf;

        return $this;
    }

    public function getEmpty(): bool
    {
        return $this->empty;
    }

    public function setEmpty(bool $empty): self
    {
        $this->initialized['empty'] = true;
        $this->empty = $empty;

        return $this;
    }
}
