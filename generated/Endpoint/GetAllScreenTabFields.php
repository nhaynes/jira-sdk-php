<?php

namespace JiraSdk\Endpoint;

class GetAllScreenTabFields extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    /**
     * Returns all fields for a screen tab.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) when the project key is specified, providing that the screen is associated with the project through a Screen Scheme and Issue Type Screen Scheme.
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param array $queryParameters {
     *     @var string $projectKey The key of the project.
     * }
     */
    public function __construct(int $screenId, int $tabId, array $queryParameters = array())
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}', '{tabId}'), array($this->screenId, $this->tabId), '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields');
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
     * @throws \JiraSdk\Exception\GetAllScreenTabFieldsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllScreenTabFieldsForbiddenException
     * @throws \JiraSdk\Exception\GetAllScreenTabFieldsNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableField[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ScreenableField[]', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAllScreenTabFieldsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetAllScreenTabFieldsForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAllScreenTabFieldsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
