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

class PermissionGrantHolder extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The type of permission holder.
     *
     * @var string
     */
    protected $type;
    /**
     * As a group's name can change, use of `value` is recommended. The identifier associated withthe `type` value that defines the holder of the permission.
     *
     * @var string
     */
    protected $parameter;
    /**
     * The identifier associated with the `type` value that defines the holder of the permission.
     *
     * @var string
     */
    protected $value;
    /**
     * Expand options that include additional permission holder details in the response.
     *
     * @var string
     */
    protected $expand;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The type of permission holder.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of permission holder.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * As a group's name can change, use of `value` is recommended. The identifier associated withthe `type` value that defines the holder of the permission.
     */
    public function getParameter(): string
    {
        return $this->parameter;
    }

    /**
     * As a group's name can change, use of `value` is recommended. The identifier associated withthe `type` value that defines the holder of the permission.
     */
    public function setParameter(string $parameter): self
    {
        $this->initialized['parameter'] = true;
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * The identifier associated with the `type` value that defines the holder of the permission.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The identifier associated with the `type` value that defines the holder of the permission.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * Expand options that include additional permission holder details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional permission holder details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }
}
