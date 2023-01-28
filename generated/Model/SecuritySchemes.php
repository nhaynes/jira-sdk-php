<?php

namespace JiraSdk\Model;

class SecuritySchemes
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
     * List of security schemes.
     *
     * @var SecurityScheme[]
     */
    protected $issueSecuritySchemes;
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
     *
     * @return self
     */
    public function setIssueSecuritySchemes(array $issueSecuritySchemes): self
    {
        $this->initialized['issueSecuritySchemes'] = true;
        $this->issueSecuritySchemes = $issueSecuritySchemes;
        return $this;
    }
}
