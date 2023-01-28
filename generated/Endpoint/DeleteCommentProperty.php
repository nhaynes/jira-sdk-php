<?php

namespace JiraSdk\Endpoint;

class DeleteCommentProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $commentId;
    protected $propertyKey;
    /**
    * Deletes a comment property.

    **[Permissions](#permissions) required:** either of:

    *  *Edit All Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete a property from any comment.
    *  *Edit Own Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete a property from a comment created by the user.

    Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
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
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{commentId}', '{propertyKey}'), array($this->commentId, $this->propertyKey), '/rest/api/3/comment/{commentId}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteCommentPropertyBadRequestException
     * @throws \JiraSdk\Exception\DeleteCommentPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteCommentPropertyForbiddenException
     * @throws \JiraSdk\Exception\DeleteCommentPropertyNotFoundException
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
            throw new \JiraSdk\Exception\DeleteCommentPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteCommentPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteCommentPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteCommentPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
