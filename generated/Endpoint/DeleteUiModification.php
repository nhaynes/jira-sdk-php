<?php

namespace JiraSdk\Endpoint;

class DeleteUiModification extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $uiModificationId;
    /**
     * Deletes a UI modification. All the contexts that belong to the UI modification are deleted too. UI modification can only be deleted by Forge apps.
     **[Permissions](#permissions) required:** None.
     *
     * @param string $uiModificationId The ID of the UI modification.
     */
    public function __construct(string $uiModificationId)
    {
        $this->uiModificationId = $uiModificationId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{uiModificationId}'), array($this->uiModificationId), '/rest/api/3/uiModifications/{uiModificationId}');
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
     * @throws \JiraSdk\Exception\DeleteUiModificationUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteUiModificationForbiddenException
     * @throws \JiraSdk\Exception\DeleteUiModificationNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteUiModificationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteUiModificationForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteUiModificationNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
