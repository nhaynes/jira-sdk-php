<?php

namespace JiraSdk\Endpoint;

class GetProjectRoleDetails extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Returns all [project roles](https://confluence.atlassian.com/x/3odKLg) and the details for each role. Note that the list of project roles is common to all projects.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var bool $currentMember Whether the roles should be filtered to include only those the user is assigned to.
    *     @var bool $excludeConnectAddons
    * }
    */
    public function __construct(string $projectIdOrKey, array $queryParameters = array())
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}/roledetails');
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
        $optionsResolver->setDefined(array('currentMember', 'excludeConnectAddons'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('currentMember' => false, 'excludeConnectAddons' => false));
        $optionsResolver->addAllowedTypes('currentMember', array('bool'));
        $optionsResolver->addAllowedTypes('excludeConnectAddons', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetProjectRoleDetailsUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectRoleDetailsNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectRoleDetails[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectRoleDetails[]', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetProjectRoleDetailsUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetProjectRoleDetailsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
