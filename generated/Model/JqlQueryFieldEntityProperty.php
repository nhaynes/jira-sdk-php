<?php

namespace JiraSdk\Model;

class JqlQueryFieldEntityProperty extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * The object on which the property is set.
     *
     * @var string
     */
    protected $entity;
    /**
     * The key of the property.
     *
     * @var string
     */
    protected $key;
    /**
     * The path in the property value to query.
     *
     * @var string
     */
    protected $path;
    /**
     * The type of the property value extraction. Not available if the extraction for the property is not registered on the instance with the [Entity property](https://developer.atlassian.com/cloud/jira/platform/modules/entity-property/) module.
     *
     * @var string
     */
    protected $type;
    /**
     * The object on which the property is set.
     *
     * @return string
     */
    public function getEntity(): string
    {
        return $this->entity;
    }
    /**
     * The object on which the property is set.
     *
     * @param string $entity
     *
     * @return self
     */
    public function setEntity(string $entity): self
    {
        $this->initialized['entity'] = true;
        $this->entity = $entity;
        return $this;
    }
    /**
     * The key of the property.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the property.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The path in the property value to query.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
    /**
     * The path in the property value to query.
     *
     * @param string $path
     *
     * @return self
     */
    public function setPath(string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;
        return $this;
    }
    /**
     * The type of the property value extraction. Not available if the extraction for the property is not registered on the instance with the [Entity property](https://developer.atlassian.com/cloud/jira/platform/modules/entity-property/) module.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of the property value extraction. Not available if the extraction for the property is not registered on the instance with the [Entity property](https://developer.atlassian.com/cloud/jira/platform/modules/entity-property/) module.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
