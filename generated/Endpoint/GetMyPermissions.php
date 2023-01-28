<?php

namespace JiraSdk\Endpoint;

class GetMyPermissions extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a list of permissions indicating which permissions the user has. Details of the user's permissions can be obtained in a global, project, issue or comment context.

    The user is reported as having a project permission:

    *  in the global context, if the user has the project permission in any project.
    *  for a project, where the project permission is determined using issue data, if the user meets the permission's criteria for any issue in the project. Otherwise, if the user has the project permission in the project.
    *  for an issue, where a project permission is determined using issue data, if the user has the permission in the issue. Otherwise, if the user has the project permission in the project containing the issue.
    *  for a comment, where the user has both the permission to browse the comment and the project permission for the comment's parent issue. Only the BROWSE\_PROJECTS permission is supported. If a `commentId` is provided whose `permissions` does not equal BROWSE\_PROJECTS, a 400 error will be returned.

    This means that users may be shown as having an issue permission (such as EDIT\_ISSUES) in the global context or a project context but may not have the permission for any or all issues. For example, if Reporters have the EDIT\_ISSUES permission a user would be shown as having this permission in the global context or the context of a project, because any user can be a reporter. However, if they are not the user who reported the issue queried they would not have EDIT\_ISSUES permission for that issue.

    Global permissions are unaffected by context.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None.
    *
    * @param array $queryParameters {
    *     @var string $projectKey The key of project. Ignored if `projectId` is provided.
    *     @var string $projectId The ID of project.
    *     @var string $issueKey The key of the issue. Ignored if `issueId` is provided.
    *     @var string $issueId The ID of the issue.
    *     @var string $permissions A list of permission keys. (Required) This parameter accepts a comma-separated list. To get the list of available permissions, use [Get all permissions](#api-rest-api-3-permissions-get).
    *     @var string $projectUuid
    *     @var string $projectConfigurationUuid
    *     @var string $commentId The ID of the comment.
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/rest/api/3/mypermissions';
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
        $optionsResolver->setDefined(array('projectKey', 'projectId', 'issueKey', 'issueId', 'permissions', 'projectUuid', 'projectConfigurationUuid', 'commentId'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('projectKey', array('string'));
        $optionsResolver->addAllowedTypes('projectId', array('string'));
        $optionsResolver->addAllowedTypes('issueKey', array('string'));
        $optionsResolver->addAllowedTypes('issueId', array('string'));
        $optionsResolver->addAllowedTypes('permissions', array('string'));
        $optionsResolver->addAllowedTypes('projectUuid', array('string'));
        $optionsResolver->addAllowedTypes('projectConfigurationUuid', array('string'));
        $optionsResolver->addAllowedTypes('commentId', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetMyPermissionsBadRequestException
     * @throws \JiraSdk\Exception\GetMyPermissionsUnauthorizedException
     * @throws \JiraSdk\Exception\GetMyPermissionsNotFoundException
     *
     * @return null|\JiraSdk\Model\Permissions
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Permissions', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetMyPermissionsBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetMyPermissionsUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetMyPermissionsNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
