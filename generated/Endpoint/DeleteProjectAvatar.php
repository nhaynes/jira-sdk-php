<?php

namespace JiraSdk\Endpoint;

class DeleteProjectAvatar extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $id;
    /**
     * Deletes a custom avatar from a project. Note that system avatars cannot be deleted.
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectIdOrKey The project ID or (case-sensitive) key.
     * @param int $id The ID of the avatar.
     */
    public function __construct(string $projectIdOrKey, int $id)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}', '{id}'), array($this->projectIdOrKey, $this->id), '/rest/api/3/project/{projectIdOrKey}/avatar/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteProjectAvatarUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteProjectAvatarForbiddenException
     * @throws \JiraSdk\Exception\DeleteProjectAvatarNotFoundException
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
            throw new \JiraSdk\Exception\DeleteProjectAvatarUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectAvatarForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectAvatarNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
