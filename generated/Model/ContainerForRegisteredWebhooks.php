<?php

namespace JiraSdk\Model;

class ContainerForRegisteredWebhooks
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
     * A list of registered webhooks.
     *
     * @var RegisteredWebhook[]
     */
    protected $webhookRegistrationResult;
    /**
     * A list of registered webhooks.
     *
     * @return RegisteredWebhook[]
     */
    public function getWebhookRegistrationResult(): array
    {
        return $this->webhookRegistrationResult;
    }
    /**
     * A list of registered webhooks.
     *
     * @param RegisteredWebhook[] $webhookRegistrationResult
     *
     * @return self
     */
    public function setWebhookRegistrationResult(array $webhookRegistrationResult): self
    {
        $this->initialized['webhookRegistrationResult'] = true;
        $this->webhookRegistrationResult = $webhookRegistrationResult;
        return $this;
    }
}
