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

class ContextualConfiguration
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the configuration.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the configuration.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The ID of the field context the configuration is associated with.
     */
    public function getFieldContextId(): string
    {
        return $this->fieldContextId;
    }

    /**
     * The ID of the field context the configuration is associated with.
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
     */
    public function setSchema($schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;

        return $this;
    }
}
