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

class UpdateUiModificationDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the UI modification. The maximum length is 255 characters.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the UI modification. The maximum length is 255 characters.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the UI modification. The maximum length is 255 characters.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the UI modification. The maximum length is 255 characters.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The data of the UI modification. The maximum size of the data is 50000 characters.
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * The data of the UI modification. The maximum size of the data is 50000 characters.
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
     */
    public function setContexts(array $contexts): self
    {
        $this->initialized['contexts'] = true;
        $this->contexts = $contexts;

        return $this;
    }
}
