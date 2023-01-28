<?php

namespace JiraSdk\Endpoint;

class UpdateProjectAvatar extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Sets the avatar displayed for a project.

    Use [Load project avatar](#api-rest-api-3-project-projectIdOrKey-avatar2-post) to store avatars against the project, before using this operation to set the displayed avatar.

    **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
    *
    * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
    * @param \JiraSdk\Model\Avatar $requestBody
    */
    public function __construct(string $projectIdOrKey, \JiraSdk\Model\Avatar $requestBody)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}/avatar');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\Avatar) {
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
     * @throws \JiraSdk\Exception\UpdateProjectAvatarUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateProjectAvatarForbiddenException
     * @throws \JiraSdk\Exception\UpdateProjectAvatarNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectAvatarUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectAvatarForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectAvatarNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
