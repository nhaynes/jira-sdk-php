<?php

namespace JiraSdk\Endpoint;

class DeleteAvatar extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $type;
    protected $owningObjectId;
    protected $id;
    /**
     * Deletes an avatar from a project or issue type.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $type The avatar type.
     * @param string $owningObjectId The ID of the item the avatar is associated with.
     * @param int $id The ID of the avatar.
     */
    public function __construct(string $type, string $owningObjectId, int $id)
    {
        $this->type = $type;
        $this->owningObjectId = $owningObjectId;
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{type}', '{owningObjectId}', '{id}'), array($this->type, $this->owningObjectId, $this->id), '/rest/api/3/universal_avatar/type/{type}/owner/{owningObjectId}/avatar/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteAvatarBadRequestException
     * @throws \JiraSdk\Exception\DeleteAvatarForbiddenException
     * @throws \JiraSdk\Exception\DeleteAvatarNotFoundException
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
            throw new \JiraSdk\Exception\DeleteAvatarBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteAvatarForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteAvatarNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
