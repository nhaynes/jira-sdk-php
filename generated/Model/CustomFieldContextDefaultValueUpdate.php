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

class CustomFieldContextDefaultValueUpdate
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var mixed[]
     */
    protected $defaultValues;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * @return mixed[]
     */
    public function getDefaultValues(): array
    {
        return $this->defaultValues;
    }

    /**
     * @param mixed[] $defaultValues
     */
    public function setDefaultValues(array $defaultValues): self
    {
        $this->initialized['defaultValues'] = true;
        $this->defaultValues = $defaultValues;

        return $this;
    }
}
