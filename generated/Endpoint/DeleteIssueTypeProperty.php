<?php

namespace JiraSdk\Endpoint;

class DeleteIssueTypeProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueTypeId;
    protected $propertyKey;
    /**
     * Deletes the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeId The ID of the issue type.
     * @param string $propertyKey The key of the property. Use [Get issue type property keys](#api-rest-api-3-issuetype-issueTypeId-properties-get) to get a list of all issue type property keys.
     */
    public function __construct(string $issueTypeId, string $propertyKey)
    {
        $this->issueTypeId = $issueTypeId;
        $this->propertyKey = $propertyKey;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueTypeId}', '{propertyKey}'), array($this->issueTypeId, $this->propertyKey), '/rest/api/3/issuetype/{issueTypeId}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteIssueTypePropertyBadRequestException
     * @throws \JiraSdk\Exception\DeleteIssueTypePropertyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteIssueTypePropertyForbiddenException
     * @throws \JiraSdk\Exception\DeleteIssueTypePropertyNotFoundException
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
            throw new \JiraSdk\Exception\DeleteIssueTypePropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueTypePropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueTypePropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueTypePropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
