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

class CustomFieldReplacement
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the custom field in which to replace the version number.
     *
     * @var int
     */
    protected $customFieldId;
    /**
     * The version number to use as a replacement for the deleted version.
     *
     * @var int
     */
    protected $moveTo;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the custom field in which to replace the version number.
     */
    public function getCustomFieldId(): int
    {
        return $this->customFieldId;
    }

    /**
     * The ID of the custom field in which to replace the version number.
     */
    public function setCustomFieldId(int $customFieldId): self
    {
        $this->initialized['customFieldId'] = true;
        $this->customFieldId = $customFieldId;

        return $this;
    }

    /**
     * The version number to use as a replacement for the deleted version.
     */
    public function getMoveTo(): int
    {
        return $this->moveTo;
    }

    /**
     * The version number to use as a replacement for the deleted version.
     */
    public function setMoveTo(int $moveTo): self
    {
        $this->initialized['moveTo'] = true;
        $this->moveTo = $moveTo;

        return $this;
    }
}
