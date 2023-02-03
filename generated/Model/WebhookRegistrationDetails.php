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

class WebhookRegistrationDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of webhooks.
     *
     * @var WebhookDetails[]
     */
    protected $webhooks;
    /**
     * The URL that specifies where to send the webhooks. This URL must use the same base URL as the Connect app. Only a single URL per app is allowed to be registered.
     *
     * @var string
     */
    protected $url;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of webhooks.
     *
     * @return WebhookDetails[]
     */
    public function getWebhooks(): array
    {
        return $this->webhooks;
    }

    /**
     * A list of webhooks.
     *
     * @param WebhookDetails[] $webhooks
     */
    public function setWebhooks(array $webhooks): self
    {
        $this->initialized['webhooks'] = true;
        $this->webhooks = $webhooks;

        return $this;
    }

    /**
     * The URL that specifies where to send the webhooks. This URL must use the same base URL as the Connect app. Only a single URL per app is allowed to be registered.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * The URL that specifies where to send the webhooks. This URL must use the same base URL as the Connect app. Only a single URL per app is allowed to be registered.
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;

        return $this;
    }
}
