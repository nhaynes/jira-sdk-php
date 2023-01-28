<?php

namespace JiraSdk\Endpoint;

class AddActorUsers extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $id;
    /**
    * Adds actors to a project role for the project.

    To replace all actors for the project, use [Set actors for project role](#api-rest-api-3-project-projectIdOrKey-role-id-put).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param \JiraSdk\Model\ActorsMap $requestBody
    */
    public function __construct(string $projectIdOrKey, int $id, \JiraSdk\Model\ActorsMap $requestBody)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->id = $id;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}', '{id}'), array($this->projectIdOrKey, $this->id), '/rest/api/3/project/{projectIdOrKey}/role/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ActorsMap) {
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
     * @throws \JiraSdk\Exception\AddActorUsersBadRequestException
     * @throws \JiraSdk\Exception\AddActorUsersUnauthorizedException
     * @throws \JiraSdk\Exception\AddActorUsersNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectRole
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectRole', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\AddActorUsersBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddActorUsersUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AddActorUsersNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
