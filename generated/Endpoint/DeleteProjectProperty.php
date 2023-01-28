<?php

namespace JiraSdk\Endpoint;

class DeleteProjectProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $propertyKey;
    /**
    * Deletes the [property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties) from a project.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the property.
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
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}', '{propertyKey}'), array($this->projectIdOrKey, $this->propertyKey), '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteProjectPropertyBadRequestException
     * @throws \JiraSdk\Exception\DeleteProjectPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteProjectPropertyForbiddenException
     * @throws \JiraSdk\Exception\DeleteProjectPropertyNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
