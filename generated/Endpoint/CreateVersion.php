<?php

namespace JiraSdk\Endpoint;

class CreateVersion extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Creates a project version.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the version is added to.
    *
    * @param \JiraSdk\Model\Version $requestBody
    */
    public function __construct(\JiraSdk\Model\Version $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/version';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\Version) {
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
     * @throws \JiraSdk\Exception\CreateVersionBadRequestException
     * @throws \JiraSdk\Exception\CreateVersionUnauthorizedException
     * @throws \JiraSdk\Exception\CreateVersionNotFoundException
     *
     * @return null|\JiraSdk\Model\Version
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Version', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\CreateVersionBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateVersionUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\CreateVersionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
