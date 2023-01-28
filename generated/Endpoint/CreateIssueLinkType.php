<?php

namespace JiraSdk\Endpoint;

class CreateIssueLinkType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Creates an issue link type. Use this operation to create descriptions of the reasons why issues are linked. The issue link type consists of a name and descriptions for a link's inward and outward relationships.

    To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\IssueLinkType $requestBody
    */
    public function __construct(\JiraSdk\Model\IssueLinkType $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/issueLinkType';
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
     * @throws \JiraSdk\Exception\CreateIssueLinkTypeBadRequestException
     * @throws \JiraSdk\Exception\CreateIssueLinkTypeUnauthorizedException
     * @throws \JiraSdk\Exception\CreateIssueLinkTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueLinkType
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueLinkType', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\CreateIssueLinkTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateIssueLinkTypeUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\CreateIssueLinkTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
