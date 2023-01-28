<?php

namespace JiraSdk\Endpoint;

class GetUserProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $propertyKey;
    /**
    * Returns the value of a user's property. If no property key is provided [Get user property keys](#api-rest-api-3-user-properties-get) is called.

    Note: This operation does not access the [user properties](https://confluence.atlassian.com/x/8YxjL) created and maintained in Jira.

    **[Permissions](#permissions) required:**

    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to get a property from any user.
    *  Access to Jira, to get a property from the calling user's record.
    *
    * @param string $propertyKey The key of the user's property.
    * @param array $queryParameters {
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
    *     @var string $userKey This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    * }
    */
    public function __construct(string $propertyKey, array $queryParameters = array())
    {
        $this->propertyKey = $propertyKey;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{propertyKey}'), array($this->propertyKey), '/rest/api/3/user/properties/{propertyKey}');
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
        $optionsResolver->setDefined(array('accountId', 'userKey', 'username'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('accountId', array('string'));
        $optionsResolver->addAllowedTypes('userKey', array('string'));
        $optionsResolver->addAllowedTypes('username', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetUserPropertyBadRequestException
     * @throws \JiraSdk\Exception\GetUserPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\GetUserPropertyForbiddenException
     * @throws \JiraSdk\Exception\GetUserPropertyNotFoundException
     *
     * @return null|\JiraSdk\Model\EntityProperty
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\EntityProperty', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetUserPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetUserPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetUserPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetUserPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
