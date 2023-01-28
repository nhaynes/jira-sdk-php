<?php

namespace JiraSdk\Endpoint;

class UpdateScreenScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenSchemeId;
    /**
     * Updates a screen scheme. Only screen schemes used in classic projects can be updated.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $screenSchemeId The ID of the screen scheme.
     * @param \JiraSdk\Model\UpdateScreenSchemeDetails $requestBody
     */
    public function __construct(string $screenSchemeId, \JiraSdk\Model\UpdateScreenSchemeDetails $requestBody)
    {
        $this->screenSchemeId = $screenSchemeId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenSchemeId}'), array($this->screenSchemeId), '/rest/api/3/screenscheme/{screenSchemeId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\UpdateScreenSchemeDetails) {
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
     * @throws \JiraSdk\Exception\UpdateScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\UpdateScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\UpdateScreenSchemeNotFoundException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateScreenSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateScreenSchemeUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateScreenSchemeForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateScreenSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
