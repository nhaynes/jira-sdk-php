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

class MultipleCustomFieldValuesUpdateDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var MultipleCustomFieldValuesUpdate[]
     */
    protected $updates;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * @return MultipleCustomFieldValuesUpdate[]
     */
    public function getUpdates(): array
    {
        return $this->updates;
    }

    /**
     * @param MultipleCustomFieldValuesUpdate[] $updates
     */
    public function setUpdates(array $updates): self
    {
        $this->initialized['updates'] = true;
        $this->updates = $updates;

        return $this;
    }
}
