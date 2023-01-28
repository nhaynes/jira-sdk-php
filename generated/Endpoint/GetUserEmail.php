<?php

namespace JiraSdk\Endpoint;

class GetUserEmail extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Returns a user's email address. This API is only available to apps approved by Atlassian, according to these [guidelines](https://community.developer.atlassian.com/t/guidelines-for-requesting-access-to-email-address/27603).
     *
     * @param array $queryParameters {
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, `5b10ac8d82e05b22cc7d4ef5`.
     * }
     */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/rest/api/3/user/email';
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
        $optionsResolver->setDefined(array('accountId'));
        $optionsResolver->setRequired(array('accountId'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('accountId', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetUserEmailBadRequestException
     * @throws \JiraSdk\Exception\GetUserEmailUnauthorizedException
     * @throws \JiraSdk\Exception\GetUserEmailNotFoundException
     * @throws \JiraSdk\Exception\GetUserEmailServiceUnavailableException
     *
     * @return null|\JiraSdk\Model\UnrestrictedUserEmail
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\UnrestrictedUserEmail', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetUserEmailBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetUserEmailUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetUserEmailNotFoundException($response);
        }
        if (503 === $status) {
            throw new \JiraSdk\Exception\GetUserEmailServiceUnavailableException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth');
    }
}
