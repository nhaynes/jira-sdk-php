<?php

namespace JiraSdk\Endpoint;

class RemovePreference extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Deletes a preference of the user, which restores the default value of system defined settings.

    Note that these keys are deprecated:

    *  *jira.user.locale* The locale of the user. By default, not set. The user takes the instance locale.
    *  *jira.user.timezone* The time zone of the user. By default, not set. The user takes the instance timezone.

    Use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API to manage timezone and locale instead.

    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param array $queryParameters {
    *     @var string $key The key of the preference.
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return '/rest/api/3/mypreferences';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
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
     * @throws \JiraSdk\Exception\RemovePreferenceUnauthorizedException
     * @throws \JiraSdk\Exception\RemovePreferenceNotFoundException
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
            throw new \JiraSdk\Exception\RemovePreferenceUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\RemovePreferenceNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
