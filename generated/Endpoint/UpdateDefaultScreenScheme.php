<?php

namespace JiraSdk\Endpoint;

class UpdateDefaultScreenScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueTypeScreenSchemeId;
    /**
     * Updates the default screen scheme of an issue type screen scheme. The default screen scheme is used for all unmapped issue types.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     * @param \JiraSdk\Model\UpdateDefaultScreenScheme $requestBody
     */
    public function __construct(string $issueTypeScreenSchemeId, \JiraSdk\Model\UpdateDefaultScreenScheme $requestBody)
    {
        $this->issueTypeScreenSchemeId = $issueTypeScreenSchemeId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueTypeScreenSchemeId}'), array($this->issueTypeScreenSchemeId), '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/mapping/default');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\UpdateDefaultScreenScheme) {
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
     * @throws \JiraSdk\Exception\UpdateDefaultScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\UpdateDefaultScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateDefaultScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\UpdateDefaultScreenSchemeNotFoundException
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
            throw new \JiraSdk\Exception\UpdateDefaultScreenSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateDefaultScreenSchemeUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateDefaultScreenSchemeForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateDefaultScreenSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
