<?php

namespace JiraSdk\Endpoint;

class AddProjectRoleActorsToRole extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Adds [default actors](#api-rest-api-3-resolution-get) to a role. You may add groups or users, but you cannot add groups and users in the same request.

    Changing a project role's default actors does not affect project role members for projects already created.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param \JiraSdk\Model\ActorInputBean $requestBody
    */
    public function __construct(int $id, \JiraSdk\Model\ActorInputBean $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/role/{id}/actors');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ActorInputBean) {
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
     * @throws \JiraSdk\Exception\AddProjectRoleActorsToRoleBadRequestException
     * @throws \JiraSdk\Exception\AddProjectRoleActorsToRoleUnauthorizedException
     * @throws \JiraSdk\Exception\AddProjectRoleActorsToRoleForbiddenException
     * @throws \JiraSdk\Exception\AddProjectRoleActorsToRoleNotFoundException
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
            throw new \JiraSdk\Exception\AddProjectRoleActorsToRoleBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddProjectRoleActorsToRoleUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\AddProjectRoleActorsToRoleForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AddProjectRoleActorsToRoleNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
