<?php

namespace JiraSdk\Model;

class WebhookRegistrationDetails
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
     *
     * @return self
     */
    public function setWebhooks(array $webhooks): self
    {
        $this->initialized['webhooks'] = true;
        $this->webhooks = $webhooks;
        return $this;
    }
    /**
     * The URL that specifies where to send the webhooks. This URL must use the same base URL as the Connect app. Only a single URL per app is allowed to be registered.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    /**
     * The URL that specifies where to send the webhooks. This URL must use the same base URL as the Connect app. Only a single URL per app is allowed to be registered.
     *
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}
