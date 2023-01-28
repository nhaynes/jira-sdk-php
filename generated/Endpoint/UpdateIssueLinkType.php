<?php

namespace JiraSdk\Endpoint;

class UpdateIssueLinkType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueLinkTypeId;
    /**
    * Updates an issue link type.

    To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $issueLinkTypeId The ID of the issue link type.
    * @param \JiraSdk\Model\IssueLinkType $requestBody
    */
    public function __construct(string $issueLinkTypeId, \JiraSdk\Model\IssueLinkType $requestBody)
    {
        $this->issueLinkTypeId = $issueLinkTypeId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueLinkTypeId}'), array($this->issueLinkTypeId), '/rest/api/3/issueLinkType/{issueLinkTypeId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueLinkType) {
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
     * @throws \JiraSdk\Exception\UpdateIssueLinkTypeBadRequestException
     * @throws \JiraSdk\Exception\UpdateIssueLinkTypeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateIssueLinkTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueLinkType
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueLinkType', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueLinkTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueLinkTypeUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueLinkTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
