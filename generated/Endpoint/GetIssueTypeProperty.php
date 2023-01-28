<?php

namespace JiraSdk\Endpoint;

class GetIssueTypeProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueTypeId;
    protected $propertyKey;
    /**
    * Returns the key and value of the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) to get the details of any issue type.
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) to get the details of any issue types associated with the projects the user has permission to browse.
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
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueTypeId}', '{propertyKey}'), array($this->issueTypeId, $this->propertyKey), '/rest/api/3/issuetype/{issueTypeId}/properties/{propertyKey}');
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
     * @throws \JiraSdk\Exception\GetIssueTypePropertyBadRequestException
     * @throws \JiraSdk\Exception\GetIssueTypePropertyUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueTypePropertyNotFoundException
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
            throw new \JiraSdk\Exception\GetIssueTypePropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueTypePropertyUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetIssueTypePropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
