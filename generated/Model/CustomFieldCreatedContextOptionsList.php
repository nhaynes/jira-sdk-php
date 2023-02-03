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

class CustomFieldCreatedContextOptionsList
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The created custom field options.
     *
     * @var CustomFieldContextOption[]
     */
    protected $options;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The created custom field options.
     *
     * @return CustomFieldContextOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * The created custom field options.
     *
     * @param CustomFieldContextOption[] $options
     */
    public function setOptions(array $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }
}
