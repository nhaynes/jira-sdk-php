<?php

namespace JiraSdk\Endpoint;

class GetAllProjectAvatars extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Returns all project avatars, grouped by system and custom avatars.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
    */
    public function __construct(string $projectIdOrKey)
    {
        $this->projectIdOrKey = $projectIdOrKey;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}/avatars');
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
     * @throws \JiraSdk\Exception\GetAllProjectAvatarsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllProjectAvatarsNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectAvatars
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectAvatars', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAllProjectAvatarsUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAllProjectAvatarsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
