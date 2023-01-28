<?php

namespace JiraSdk\Endpoint;

class GetIssuePropertyKeys extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Returns the URLs and keys of an issue's properties.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** Property details are only returned where the user has:

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The key or ID of the issue.
    */
    public function __construct(string $issueIdOrKey)
    {
        $this->issueIdOrKey = $issueIdOrKey;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}/properties');
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
     * @throws \JiraSdk\Exception\GetIssuePropertyKeysNotFoundException
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
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetIssuePropertyKeysNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
