<?php

namespace JiraSdk\Endpoint;

class GetApplicationRole extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $key;
    /**
     * Returns an application role.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $key The key of the application role. Use the [Get all application roles](#api-rest-api-3-applicationrole-get) operation to get the key for each application role.
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{key}'), array($this->key), '/rest/api/3/applicationrole/{key}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetApplicationRoleUnauthorizedException
     * @throws \JiraSdk\Exception\GetApplicationRoleForbiddenException
     * @throws \JiraSdk\Exception\GetApplicationRoleNotFoundException
     *
     * @return null|\JiraSdk\Model\ApplicationRole
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ApplicationRole', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetApplicationRoleUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetApplicationRoleForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetApplicationRoleNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth');
    }
}
