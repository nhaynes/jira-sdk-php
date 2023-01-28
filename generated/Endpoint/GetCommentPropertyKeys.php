<?php

namespace JiraSdk\Endpoint;

class GetCommentPropertyKeys extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $commentId;
    /**
    * Returns the keys of all the properties of a comment.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $commentId The ID of the comment.
    */
    public function __construct(string $commentId)
    {
        $this->commentId = $commentId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{commentId}'), array($this->commentId), '/rest/api/3/comment/{commentId}/properties');
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
     * @throws \JiraSdk\Exception\GetCommentPropertyKeysBadRequestException
     * @throws \JiraSdk\Exception\GetCommentPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Exception\GetCommentPropertyKeysForbiddenException
     * @throws \JiraSdk\Exception\GetCommentPropertyKeysNotFoundException
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
            throw new \JiraSdk\Exception\GetCommentPropertyKeysBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetCommentPropertyKeysUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetCommentPropertyKeysForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetCommentPropertyKeysNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
