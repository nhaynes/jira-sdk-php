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

class ConnectCustomFieldValues
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of custom field update details.
     *
     * @var ConnectCustomFieldValue[]
     */
    protected $updateValueList;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of custom field update details.
     *
     * @return ConnectCustomFieldValue[]
     */
    public function getUpdateValueList(): array
    {
        return $this->updateValueList;
    }

    /**
     * The list of custom field update details.
     *
     * @param ConnectCustomFieldValue[] $updateValueList
     */
    public function setUpdateValueList(array $updateValueList): self
    {
        $this->initialized['updateValueList'] = true;
        $this->updateValueList = $updateValueList;

        return $this;
    }
}
