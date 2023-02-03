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

class FieldLastUsed
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Last used value type:
     *  *TRACKED*: field is tracked and a last used date is available.
     *  *NOT\_TRACKED*: field is not tracked, last used date is not available.
     *  *NO\_INFORMATION*: field is tracked, but no last used date is available.
     *
     * @var string
     */
    protected $type;
    /**
     * The date when the value of the field last changed.
     *
     * @var \DateTime
     */
    protected $value;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Last used value type:
     *  *TRACKED*: field is tracked and a last used date is available.
     *  *NOT\_TRACKED*: field is not tracked, last used date is not available.
     *  *NO\_INFORMATION*: field is tracked, but no last used date is available.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Last used value type:
     *  *TRACKED*: field is tracked and a last used date is available.
     *  *NOT\_TRACKED*: field is not tracked, last used date is not available.
     *  *NO\_INFORMATION*: field is tracked, but no last used date is available.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The date when the value of the field last changed.
     */
    public function getValue(): \DateTime
    {
        return $this->value;
    }

    /**
     * The date when the value of the field last changed.
     */
    public function setValue(\DateTime $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
