<?php

namespace JiraSdk\Endpoint;

class GetAvatars extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $type;
    protected $entityId;
    /**
    * Returns the system and custom avatars for a project or issue type.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  for custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
    *  for custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
    *  for system avatars, none.
    *
    * @param string $type The avatar type.
    * @param string $entityId The ID of the item the avatar is associated with.
    */
    public function __construct(string $type, string $entityId)
    {
        $this->type = $type;
        $this->entityId = $entityId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{type}', '{entityId}'), array($this->type, $this->entityId), '/rest/api/3/universal_avatar/type/{type}/owner/{entityId}');
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
     * @throws \JiraSdk\Exception\GetAvatarsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAvatarsNotFoundException
     *
     * @return null|\JiraSdk\Model\Avatars
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Avatars', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAvatarsUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAvatarsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
