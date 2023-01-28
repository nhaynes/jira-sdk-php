<?php

namespace JiraSdk\Endpoint;

class PartialUpdateProjectRole extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Updates either the project role's name or its description.

    You cannot update both the name and description at the same time using this operation. If you send a request with a name and a description only the name is updated.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param \JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody
    */
    public function __construct(int $id, \JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody)
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/role/{id}');
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
     * @throws \JiraSdk\Exception\PartialUpdateProjectRoleBadRequestException
     * @throws \JiraSdk\Exception\PartialUpdateProjectRoleUnauthorizedException
     * @throws \JiraSdk\Exception\PartialUpdateProjectRoleForbiddenException
     * @throws \JiraSdk\Exception\PartialUpdateProjectRoleNotFoundException
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
            throw new \JiraSdk\Exception\PartialUpdateProjectRoleBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\PartialUpdateProjectRoleUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\PartialUpdateProjectRoleForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\PartialUpdateProjectRoleNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
