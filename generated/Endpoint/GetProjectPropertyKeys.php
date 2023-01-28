<?php

namespace JiraSdk\Endpoint;

class GetProjectPropertyKeys extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Returns all [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties) keys for the project.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    */
    public function __construct(string $projectIdOrKey)
    {
        $this->projectIdOrKey = $projectIdOrKey;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}/properties');
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
     * @throws \JiraSdk\Exception\GetProjectPropertyKeysBadRequestException
     * @throws \JiraSdk\Exception\GetProjectPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectPropertyKeysForbiddenException
     * @throws \JiraSdk\Exception\GetProjectPropertyKeysNotFoundException
     *
     * @return null|\JiraSdk\Model\PropertyKeys
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PropertyKeys', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetProjectPropertyKeysBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetProjectPropertyKeysUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetProjectPropertyKeysForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetProjectPropertyKeysNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
