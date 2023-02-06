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

namespace JiraSdk\Tests;

use JiraSdk\Client;
use JiraSdk\ClientFactory;
use PHPUnit\Framework\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    protected function setUp(): void
    {
        if (!$this->getSiteName()) {
            $this->markTestSkipped('JIRA_SITE env var is not present, skipping integration test.');
        }

        if (!$this->getToken()) {
            $this->markTestSkipped('JIRA_TOKEN env var is not present, skipping integration test.');
        }
    }

    protected function createClient(?string $sitename = null, ?string $username = null, ?string $token = null): Client
    {
        return ClientFactory::create(
            $sitename ?? $this->getSiteName(),
            $username ?? $this->getUsername(),
            $token ?? $this->getToken()
        );
    }

    protected function getSiteName(): ?string
    {
        return $_SERVER['JIRA_SITE'] ?? null;
    }

    protected function getUsername(): ?string
    {
        return $_SERVER['JIRA_USERNAME'] ?? null;
    }

    protected function getToken(): ?string
    {
        return $_SERVER['JIRA_TOKEN'] ?? null;
    }

    protected function getProjectKey(): string
    {
        return $_SERVER['JIRA_PROJECT'] ?? null;
    }

    protected function getAccountId(): string
    {
        return $_SERVER['JIRA_ACCOUNT_ID'] ?? null;
    }
}
