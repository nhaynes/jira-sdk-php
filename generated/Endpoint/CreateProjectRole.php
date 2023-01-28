<?php

namespace JiraSdk\Endpoint;

class CreateProjectRole extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Creates a new project role with no [default actors](#api-rest-api-3-resolution-get). You can use the [Add default actors to project role](#api-rest-api-3-role-id-actors-post) operation to add default actors to the project role after creating it.
     *Note that although a new project role is available to all projects upon creation, any default actors that are associated with the project role are not added to projects that existed prior to the role being created.*<
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody
     */
    public function __construct(\JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/role';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\CreateUpdateRoleRequestBean) {
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
     * @throws \JiraSdk\Exception\CreateProjectRoleBadRequestException
     * @throws \JiraSdk\Exception\CreateProjectRoleUnauthorizedException
     * @throws \JiraSdk\Exception\CreateProjectRoleForbiddenException
     * @throws \JiraSdk\Exception\CreateProjectRoleConflictException
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
            throw new \JiraSdk\Exception\CreateProjectRoleBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateProjectRoleUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\CreateProjectRoleForbiddenException($response);
        }
        if (409 === $status) {
            throw new \JiraSdk\Exception\CreateProjectRoleConflictException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
