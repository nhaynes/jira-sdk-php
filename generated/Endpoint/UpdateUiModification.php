<?php

namespace JiraSdk\Endpoint;

class UpdateUiModification extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $uiModificationId;
    /**
    * Updates a UI modification. UI modification can only be updated by Forge apps.

    Each UI modification can define up to 1000 contexts.

    **[Permissions](#permissions) required:**

    *  *None* if the UI modification is created without contexts.
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for one or more projects, if the UI modification is created with contexts.
    *
    * @param string $uiModificationId The ID of the UI modification.
    * @param \JiraSdk\Model\UpdateUiModificationDetails $requestBody
    */
    public function __construct(string $uiModificationId, \JiraSdk\Model\UpdateUiModificationDetails $requestBody)
    {
        $this->uiModificationId = $uiModificationId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{uiModificationId}'), array($this->uiModificationId), '/rest/api/3/uiModifications/{uiModificationId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\UpdateUiModificationDetails) {
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
     * @throws \JiraSdk\Exception\UpdateUiModificationBadRequestException
     * @throws \JiraSdk\Exception\UpdateUiModificationUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateUiModificationForbiddenException
     * @throws \JiraSdk\Exception\UpdateUiModificationNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateUiModificationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateUiModificationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateUiModificationForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateUiModificationNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
