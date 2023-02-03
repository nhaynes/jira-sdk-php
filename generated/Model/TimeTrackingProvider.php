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

class TimeTrackingProvider
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The key for the time tracking provider. For example, *JIRA*.
     *
     * @var string
     */
    protected $key;
    /**
     * The name of the time tracking provider. For example, *JIRA provided time tracking*.
     *
     * @var string
     */
    protected $name;
    /**
     * The URL of the configuration page for the time tracking provider app. For example, *\/example/config/url*. This property is only returned if the `adminPageKey` property is set in the module descriptor of the time tracking provider app.
     *
     * @var string
     */
    protected $url;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The key for the time tracking provider. For example, *JIRA*.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key for the time tracking provider. For example, *JIRA*.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The name of the time tracking provider. For example, *JIRA provided time tracking*.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the time tracking provider. For example, *JIRA provided time tracking*.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The URL of the configuration page for the time tracking provider app. For example, *\/example/config/url*. This property is only returned if the `adminPageKey` property is set in the module descriptor of the time tracking provider app.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * The URL of the configuration page for the time tracking provider app. For example, *\/example/config/url*. This property is only returned if the `adminPageKey` property is set in the module descriptor of the time tracking provider app.
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;

        return $this;
    }
}
