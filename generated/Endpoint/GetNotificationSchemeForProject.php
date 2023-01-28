<?php

namespace JiraSdk\Endpoint;

class GetNotificationSchemeForProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectKeyOrId;
    /**
     * Gets a [notification scheme](https://confluence.atlassian.com/x/8YdKLg) associated with the project. Deprecated, use [Get notification schemes paginated](#api-rest-api-3-notificationscheme-get) supporting search and pagination.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `all` Returns all expandable information
     *  `field` Returns information about any custom fields assigned to receive an event
     *  `group` Returns information about any groups assigned to receive an event
     *  `notificationSchemeEvents` Returns a list of event associations. This list is returned for all expandable information
     *  `projectRole` Returns information about any project roles assigned to receive an event
     *  `user` Returns information about any users assigned to receive an event
     * }
     */
    public function __construct(string $projectKeyOrId, array $queryParameters = array())
    {
        $this->projectKeyOrId = $projectKeyOrId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectKeyOrId}'), array($this->projectKeyOrId), '/rest/api/3/project/{projectKeyOrId}/notificationscheme');
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
        $optionsResolver->setDefined(array('expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetNotificationSchemeForProjectBadRequestException
     * @throws \JiraSdk\Exception\GetNotificationSchemeForProjectUnauthorizedException
     * @throws \JiraSdk\Exception\GetNotificationSchemeForProjectNotFoundException
     *
     * @return null|\JiraSdk\Model\NotificationScheme
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\NotificationScheme', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetNotificationSchemeForProjectBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetNotificationSchemeForProjectUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetNotificationSchemeForProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
