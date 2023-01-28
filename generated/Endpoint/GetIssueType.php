<?php

namespace JiraSdk\Endpoint;

class GetIssueType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns an issue type.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) in a project the issue type is associated with or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The ID of the issue type.
    */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/issuetype/{id}');
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
     * @throws \JiraSdk\Exception\GetIssueTypeBadRequestException
     * @throws \JiraSdk\Exception\GetIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypeDetails
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueTypeDetails', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetIssueTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueTypeUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetIssueTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
