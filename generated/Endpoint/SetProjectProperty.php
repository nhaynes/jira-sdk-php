<?php

namespace JiraSdk\Endpoint;

class SetProjectProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $propertyKey;
    /**
    * Sets the value of the [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties). You can use project properties to store custom data against the project.

    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project in which the property is created.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $propertyKey The key of the project property. The maximum length is 255 characters.
    * @param mixed $requestBody
    */
    public function __construct(string $projectIdOrKey, string $propertyKey, $requestBody)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->propertyKey = $propertyKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}', '{propertyKey}'), array($this->projectIdOrKey, $this->propertyKey), '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (isset($this->body)) {
            return array(array('Content-Type' => array('application/json')), json_encode($this->body));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\SetProjectPropertyBadRequestException
     * @throws \JiraSdk\Exception\SetProjectPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\SetProjectPropertyForbiddenException
     * @throws \JiraSdk\Exception\SetProjectPropertyNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\SetProjectPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetProjectPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SetProjectPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SetProjectPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
