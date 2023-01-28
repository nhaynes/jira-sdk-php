<?php

namespace JiraSdk\Endpoint;

class GetAllScreenTabs extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    /**
     * Returns the list of tabs for a screen.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) when the project key is specified, providing that the screen is associated with the project through a Screen Scheme and Issue Type Screen Scheme.
     *
     * @param int $screenId The ID of the screen.
     * @param array $queryParameters {
     *     @var string $projectKey The key of the project.
     * }
     */
    public function __construct(int $screenId, array $queryParameters = array())
    {
        $this->screenId = $screenId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}'), array($this->screenId), '/rest/api/3/screens/{screenId}/tabs');
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
        $optionsResolver->setDefined(array('projectKey'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('projectKey', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetAllScreenTabsBadRequestException
     * @throws \JiraSdk\Exception\GetAllScreenTabsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllScreenTabsForbiddenException
     * @throws \JiraSdk\Exception\GetAllScreenTabsNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableTab[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ScreenableTab[]', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetAllScreenTabsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAllScreenTabsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetAllScreenTabsForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAllScreenTabsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
