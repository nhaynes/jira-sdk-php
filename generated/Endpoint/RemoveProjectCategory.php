<?php

namespace JiraSdk\Endpoint;

class RemoveProjectCategory extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Deletes a project category.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id ID of the project category to delete.
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/projectCategory/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\RemoveProjectCategoryUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveProjectCategoryForbiddenException
     * @throws \JiraSdk\Exception\RemoveProjectCategoryNotFoundException
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
        if (401 === $status) {
            throw new \JiraSdk\Exception\RemoveProjectCategoryUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\RemoveProjectCategoryForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\RemoveProjectCategoryNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
