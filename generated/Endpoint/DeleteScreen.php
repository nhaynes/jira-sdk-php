<?php

namespace JiraSdk\Endpoint;

class DeleteScreen extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    /**
    * Deletes a screen. A screen cannot be deleted if it is used in a screen scheme, workflow, or workflow draft.

    Only screens used in classic projects can be deleted.
    *
    * @param int $screenId The ID of the screen.
    */
    public function __construct(int $screenId)
    {
        $this->screenId = $screenId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}'), array($this->screenId), '/rest/api/3/screens/{screenId}');
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
     * @throws \JiraSdk\Exception\DeleteScreenBadRequestException
     * @throws \JiraSdk\Exception\DeleteScreenUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteScreenForbiddenException
     * @throws \JiraSdk\Exception\DeleteScreenNotFoundException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteScreenBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteScreenUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteScreenForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteScreenNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
