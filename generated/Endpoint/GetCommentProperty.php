<?php

namespace JiraSdk\Endpoint;

class GetCommentProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $commentId;
    protected $propertyKey;
    /**
    * Returns the value of a comment property.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $commentId The ID of the comment.
    * @param string $propertyKey The key of the property.
    */
    public function __construct(string $commentId, string $propertyKey)
    {
        $this->commentId = $commentId;
        $this->propertyKey = $propertyKey;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{commentId}', '{propertyKey}'), array($this->commentId, $this->propertyKey), '/rest/api/3/comment/{commentId}/properties/{propertyKey}');
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
     * @throws \JiraSdk\Exception\GetCommentPropertyBadRequestException
     * @throws \JiraSdk\Exception\GetCommentPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\GetCommentPropertyForbiddenException
     * @throws \JiraSdk\Exception\GetCommentPropertyNotFoundException
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
            throw new \JiraSdk\Exception\GetCommentPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetCommentPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetCommentPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetCommentPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
