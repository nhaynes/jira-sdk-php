<?php

namespace JiraSdk\Model;

class ContainerForWebhookIDs
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
     * A list of webhook IDs.
     *
     * @var int[]
     */
    protected $webhookIds;
    /**
     * A list of webhook IDs.
     *
     * @return int[]
     */
    public function getWebhookIds(): array
    {
        return $this->webhookIds;
    }
    /**
     * A list of webhook IDs.
     *
     * @param int[] $webhookIds
     *
     * @return self
     */
    public function setWebhookIds(array $webhookIds): self
    {
        $this->initialized['webhookIds'] = true;
        $this->webhookIds = $webhookIds;
        return $this;
    }
}
