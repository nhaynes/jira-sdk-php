<?php

namespace JiraSdk\Endpoint;

class SetCommentProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $commentId;
    protected $propertyKey;
    /**
    * Creates or updates the value of a property for a comment. Use this resource to store custom data against a comment.

    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.

    **[Permissions](#permissions) required:** either of:

    *  *Edit All Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to create or update the value of a property on any comment.
    *  *Edit Own Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to create or update the value of a property on a comment created by the user.

    Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
    *
    * @param string $commentId The ID of the comment.
    * @param string $propertyKey The key of the property. The maximum length is 255 characters.
    * @param mixed $requestBody
    */
    public function __construct(string $commentId, string $propertyKey, $requestBody)
    {
        $this->commentId = $commentId;
        $this->propertyKey = $propertyKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{commentId}', '{propertyKey}'), array($this->commentId, $this->propertyKey), '/rest/api/3/comment/{commentId}/properties/{propertyKey}');
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
     * @throws \JiraSdk\Exception\SetCommentPropertyBadRequestException
     * @throws \JiraSdk\Exception\SetCommentPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\SetCommentPropertyForbiddenException
     * @throws \JiraSdk\Exception\SetCommentPropertyNotFoundException
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
            throw new \JiraSdk\Exception\SetCommentPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetCommentPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SetCommentPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SetCommentPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
