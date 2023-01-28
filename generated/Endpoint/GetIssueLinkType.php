<?php

namespace JiraSdk\Endpoint;

class GetIssueLinkType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueLinkTypeId;
    /**
    * Returns an issue link type.

    To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for a project in the site.
    *
    * @param string $issueLinkTypeId The ID of the issue link type.
    */
    public function __construct(string $issueLinkTypeId)
    {
        $this->issueLinkTypeId = $issueLinkTypeId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueLinkTypeId}'), array($this->issueLinkTypeId), '/rest/api/3/issueLinkType/{issueLinkTypeId}');
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
     * @throws \JiraSdk\Exception\GetIssueLinkTypeBadRequestException
     * @throws \JiraSdk\Exception\GetIssueLinkTypeUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueLinkTypeNotFoundException
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
            throw new \JiraSdk\Exception\GetIssueLinkTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueLinkTypeUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetIssueLinkTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
