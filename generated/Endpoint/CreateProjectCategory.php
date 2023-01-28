<?php

namespace JiraSdk\Endpoint;

class CreateProjectCategory extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Creates a project category.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\ProjectCategory $requestBody
     */
    public function __construct(\JiraSdk\Model\ProjectCategory $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/projectCategory';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ProjectCategory) {
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
     * @throws \JiraSdk\Exception\CreateProjectCategoryBadRequestException
     * @throws \JiraSdk\Exception\CreateProjectCategoryUnauthorizedException
     * @throws \JiraSdk\Exception\CreateProjectCategoryForbiddenException
     * @throws \JiraSdk\Exception\CreateProjectCategoryConflictException
     *
     * @return null|\JiraSdk\Model\ProjectCategory
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectCategory', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\CreateProjectCategoryBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateProjectCategoryUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\CreateProjectCategoryForbiddenException($response);
        }
        if (409 === $status) {
            throw new \JiraSdk\Exception\CreateProjectCategoryConflictException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
