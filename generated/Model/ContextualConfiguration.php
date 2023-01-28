<?php

namespace JiraSdk\Model;

class ContextualConfiguration
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
     * The ID of the configuration.
     *
     * @var string
     */
    protected $id;
    /**
     * The ID of the field context the configuration is associated with.
     *
     * @var string
     */
    protected $fieldContextId;
    /**
     * The field configuration.
     *
     * @var mixed
     */
    protected $configuration;
    /**
     * The field value schema.
     *
     * @var mixed
     */
    protected $schema;
    /**
     * The ID of the configuration.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the configuration.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The ID of the field context the configuration is associated with.
     *
     * @return string
     */
    public function getFieldContextId(): string
    {
        return $this->fieldContextId;
    }
    /**
     * The ID of the field context the configuration is associated with.
     *
     * @param string $fieldContextId
     *
     * @return self
     */
    public function setFieldContextId(string $fieldContextId): self
    {
        $this->initialized['fieldContextId'] = true;
        $this->fieldContextId = $fieldContextId;
        return $this;
    }
    /**
     * The field configuration.
     *
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }
    /**
     * The field configuration.
     *
     * @param mixed $configuration
     *
     * @return self
     */
    public function setConfiguration($configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;
        return $this;
    }
    /**
     * The field value schema.
     *
     * @return mixed
     */
    public function getSchema()
    {
        return $this->schema;
    }
    /**
     * The field value schema.
     *
     * @param mixed $schema
     *
     * @return self
     */
    public function setSchema($schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;
        return $this;
    }
}
