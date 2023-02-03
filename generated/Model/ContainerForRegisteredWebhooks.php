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

class ContainerForRegisteredWebhooks
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of registered webhooks.
     *
     * @var RegisteredWebhook[]
     */
    protected $webhookRegistrationResult;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setWebhookRegistrationResult(array $webhookRegistrationResult): self
    {
        $this->initialized['webhookRegistrationResult'] = true;
        $this->webhookRegistrationResult = $webhookRegistrationResult;

        return $this;
    }
}
