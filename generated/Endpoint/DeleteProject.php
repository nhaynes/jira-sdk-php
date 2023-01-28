<?php

namespace JiraSdk\Endpoint;

class DeleteProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Deletes a project.

    You can't delete a project if it's archived. To delete an archived project, restore the project and then delete it. To restore a project, use the Jira UI.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var bool $enableUndo Whether this project is placed in the Jira recycle bin where it will be available for restoration.
    * }
    */
    public function __construct(string $projectIdOrKey, array $queryParameters = array())
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('enableUndo'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('enableUndo' => false));
        $optionsResolver->addAllowedTypes('enableUndo', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteProjectUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteProjectNotFoundException
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
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
