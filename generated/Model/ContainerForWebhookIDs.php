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

class ContainerForWebhookIDs
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of webhook IDs.
     *
     * @var int[]
     */
    protected $webhookIds;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setWebhookIds(array $webhookIds): self
    {
        $this->initialized['webhookIds'] = true;
        $this->webhookIds = $webhookIds;

        return $this;
    }
}
