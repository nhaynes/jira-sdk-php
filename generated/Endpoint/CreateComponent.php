<?php

namespace JiraSdk\Endpoint;

class CreateComponent extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Creates a component. Use components to provide containers for issues within a project.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project in which the component is created or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\ProjectComponent $requestBody
    */
    public function __construct(\JiraSdk\Model\ProjectComponent $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/component';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ProjectComponent) {
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
     * @throws \JiraSdk\Exception\CreateComponentBadRequestException
     * @throws \JiraSdk\Exception\CreateComponentUnauthorizedException
     * @throws \JiraSdk\Exception\CreateComponentForbiddenException
     * @throws \JiraSdk\Exception\CreateComponentNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectComponent
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectComponent', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\CreateComponentBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateComponentUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\CreateComponentForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\CreateComponentNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
