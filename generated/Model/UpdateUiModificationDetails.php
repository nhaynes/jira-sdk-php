<?php

namespace JiraSdk\Model;

class UpdateUiModificationDetails
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
     * The name of the UI modification. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the UI modification. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $description;
    /**
     * The data of the UI modification. The maximum size of the data is 50000 characters.
     *
     * @var string
     */
    protected $data;
    /**
     * List of contexts of the UI modification. The maximum number of contexts is 1000. If provided, replaces all existing contexts.
     *
     * @var UiModificationContextDetails[]
     */
    protected $contexts;
    /**
     * The name of the UI modification. The maximum length is 255 characters.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the UI modification. The maximum length is 255 characters.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The description of the UI modification. The maximum length is 255 characters.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the UI modification. The maximum length is 255 characters.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * The data of the UI modification. The maximum size of the data is 50000 characters.
     *
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }
    /**
     * The data of the UI modification. The maximum size of the data is 50000 characters.
     *
     * @param string $data
     *
     * @return self
     */
    public function setData(string $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * List of contexts of the UI modification. The maximum number of contexts is 1000. If provided, replaces all existing contexts.
     *
     * @return UiModificationContextDetails[]
     */
    public function getContexts(): array
    {
        return $this->contexts;
    }
    /**
     * List of contexts of the UI modification. The maximum number of contexts is 1000. If provided, replaces all existing contexts.
     *
     * @param UiModificationContextDetails[] $contexts
     *
     * @return self
     */
    public function setContexts(array $contexts): self
    {
        $this->initialized['contexts'] = true;
        $this->contexts = $contexts;
        return $this;
    }
}
