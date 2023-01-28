<?php

namespace JiraSdk\Endpoint;

class CreateUiModification extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Creates a UI modification. UI modification can only be created by Forge apps.

    Each app can define up to 100 UI modifications. Each UI modification can define up to 1000 contexts.

    **[Permissions](#permissions) required:**

    *  *None* if the UI modification is created without contexts.
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for one or more projects, if the UI modification is created with contexts.
    *
    * @param \JiraSdk\Model\CreateUiModificationDetails $requestBody
    */
    public function __construct(\JiraSdk\Model\CreateUiModificationDetails $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/uiModifications';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\CreateUiModificationDetails) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
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
     * @throws \JiraSdk\Exception\CreateUiModificationBadRequestException
     * @throws \JiraSdk\Exception\CreateUiModificationUnauthorizedException
     * @throws \JiraSdk\Exception\CreateUiModificationForbiddenException
     * @throws \JiraSdk\Exception\CreateUiModificationNotFoundException
     *
     * @return null|\JiraSdk\Model\UiModificationIdentifiers
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\UiModificationIdentifiers', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\CreateUiModificationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateUiModificationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\CreateUiModificationForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\CreateUiModificationNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
