<?php

namespace JiraSdk\Endpoint;

class DeleteProjectRole extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Deletes a project role. You must specify a replacement project role if you wish to delete a project role that is in use.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the project role to delete. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param array $queryParameters {
     *     @var int $swap The ID of the project role that will replace the one being deleted.
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/role/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('swap'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('swap', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteProjectRoleBadRequestException
     * @throws \JiraSdk\Exception\DeleteProjectRoleUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteProjectRoleForbiddenException
     * @throws \JiraSdk\Exception\DeleteProjectRoleNotFoundException
     * @throws \JiraSdk\Exception\DeleteProjectRoleConflictException
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
            throw new \JiraSdk\Exception\DeleteProjectRoleBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectRoleUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectRoleForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectRoleNotFoundException($response);
        }
        if (409 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectRoleConflictException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
