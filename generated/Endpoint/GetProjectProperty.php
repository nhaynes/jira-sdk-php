<?php

namespace JiraSdk\Endpoint;

class GetProjectProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $propertyKey;
    /**
    * Returns the value of a [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the property.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $propertyKey The project property key. Use [Get project property keys](#api-rest-api-3-project-projectIdOrKey-properties-get) to get a list of all project property keys.
    */
    public function __construct(string $projectIdOrKey, string $propertyKey)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->propertyKey = $propertyKey;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}', '{propertyKey}'), array($this->projectIdOrKey, $this->propertyKey), '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}');
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
     * @throws \JiraSdk\Exception\GetProjectPropertyBadRequestException
     * @throws \JiraSdk\Exception\GetProjectPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectPropertyForbiddenException
     * @throws \JiraSdk\Exception\GetProjectPropertyNotFoundException
     *
     * @return null|\JiraSdk\Model\EntityProperty
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\EntityProperty', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetProjectPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetProjectPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetProjectPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetProjectPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
