<?php

namespace JiraSdk\Endpoint;

class GetNotificationScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Returns a [notification scheme](https://confluence.atlassian.com/x/8YdKLg), including the list of events and the recipients who will receive notifications for those events.
     **[Permissions](#permissions) required:** Permission to access Jira, however, the user must have permission to administer at least one project associated with the notification scheme.
     *
     * @param int $id The ID of the notification scheme. Use [Get notification schemes paginated](#api-rest-api-3-notificationscheme-get) to get a list of notification scheme IDs.
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
    public function __construct(int $id, array $queryParameters = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/notificationscheme/{id}');
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
     * @throws \JiraSdk\Exception\GetNotificationSchemeBadRequestException
     * @throws \JiraSdk\Exception\GetNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetNotificationSchemeNotFoundException
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
            throw new \JiraSdk\Exception\GetNotificationSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetNotificationSchemeUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetNotificationSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
