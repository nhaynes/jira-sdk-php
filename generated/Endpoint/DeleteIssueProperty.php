<?php

namespace JiraSdk\Endpoint;

class DeleteIssueProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $propertyKey;
    /**
    * Deletes an issue's property.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* and *Edit issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The key or ID of the issue.
    * @param string $propertyKey The key of the property.
    */
    public function __construct(string $issueIdOrKey, string $propertyKey)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->propertyKey = $propertyKey;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{propertyKey}'), array($this->issueIdOrKey, $this->propertyKey), '/rest/api/3/issue/{issueIdOrKey}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteIssuePropertyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteIssuePropertyNotFoundException
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
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteIssuePropertyUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteIssuePropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
