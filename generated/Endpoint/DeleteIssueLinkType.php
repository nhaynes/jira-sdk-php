<?php

namespace JiraSdk\Endpoint;

class DeleteIssueLinkType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueLinkTypeId;
    /**
    * Deletes an issue link type.

    To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $issueLinkTypeId The ID of the issue link type.
    */
    public function __construct(string $issueLinkTypeId)
    {
        $this->issueLinkTypeId = $issueLinkTypeId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueLinkTypeId}'), array($this->issueLinkTypeId), '/rest/api/3/issueLinkType/{issueLinkTypeId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteIssueLinkTypeBadRequestException
     * @throws \JiraSdk\Exception\DeleteIssueLinkTypeUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteIssueLinkTypeNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueLinkTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueLinkTypeUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueLinkTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
