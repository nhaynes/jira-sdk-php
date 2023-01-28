<?php

namespace JiraSdk\Endpoint;

class DeleteProjectRoleActorsFromRole extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Deletes the [default actors](#api-rest-api-3-resolution-get) from a project role. You may delete a group or user, but you cannot delete a group and a user in the same request.

    Changing a project role's default actors does not affect project role members for projects already created.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param array $queryParameters {
    *     @var string $user The user account ID of the user to remove as a default actor.
    *     @var string $groupId The group ID of the group to be removed as a default actor. This parameter cannot be used with the `group` parameter.
    *     @var string $group The group name of the group to be removed as a default actor.This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended.
    * }
    */
    public function __construct(int $id, array $queryParameters = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/role/{id}/actors');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('user', 'groupId', 'group'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('user', array('string'));
        $optionsResolver->addAllowedTypes('groupId', array('string'));
        $optionsResolver->addAllowedTypes('group', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleBadRequestException
     * @throws \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleForbiddenException
     * @throws \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleNotFoundException
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
            throw new \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
