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

class SecuritySchemes
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * List of security schemes.
     *
     * @var SecurityScheme[]
     */
    protected $issueSecuritySchemes;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * List of security schemes.
     *
     * @return SecurityScheme[]
     */
    public function getIssueSecuritySchemes(): array
    {
        return $this->issueSecuritySchemes;
    }

    /**
     * List of security schemes.
     *
     * @param SecurityScheme[] $issueSecuritySchemes
     */
    public function setIssueSecuritySchemes(array $issueSecuritySchemes): self
    {
        $this->initialized['issueSecuritySchemes'] = true;
        $this->issueSecuritySchemes = $issueSecuritySchemes;

        return $this;
    }
}
