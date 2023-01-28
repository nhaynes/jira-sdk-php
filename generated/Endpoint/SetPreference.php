<?php

namespace JiraSdk\Endpoint;

class SetPreference extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Creates a preference for the user or updates a preference's value by sending a plain text string. For example, `false`. An arbitrary preference can be created with the value containing up to 255 characters. In addition, the following keys define system preferences that can be set or created:

    *  *user.notifications.mimetype* The mime type used in notifications sent to the user. Defaults to `html`.
    *  *user.notify.own.changes* Whether the user gets notified of their own changes. Defaults to `false`.
    *  *user.default.share.private* Whether new [ filters](https://confluence.atlassian.com/x/eQiiLQ) are set to private. Defaults to `true`.
    *  *user.keyboard.shortcuts.disabled* Whether keyboard shortcuts are disabled. Defaults to `false`.
    *  *user.autowatch.disabled* Whether the user automatically watches issues they create or add a comment to. By default, not set: the user takes the instance autowatch setting.

    Note that these keys are deprecated:

    *  *jira.user.locale* The locale of the user. By default, not set. The user takes the instance locale.
    *  *jira.user.timezone* The time zone of the user. By default, not set. The user takes the instance timezone.

    Use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API to manage timezone and locale instead.

    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param string $requestBody
    * @param array $queryParameters {
    *     @var string $key The key of the preference. The maximum length is 255 characters.
    * }
    */
    public function __construct(string $requestBody, array $queryParameters = array())
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/mypreferences';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (is_string($this->body)) {
            return array(array('Content-Type' => array('application/json')), json_encode($this->body));
        }
        if (is_string($this->body)) {
            return array(array('Content-Type' => array('text/plain')), $this->body);
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('key'));
        $optionsResolver->setRequired(array('key'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('key', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\SetPreferenceUnauthorizedException
     * @throws \JiraSdk\Exception\SetPreferenceNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetPreferenceUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SetPreferenceNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
