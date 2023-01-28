<?php

namespace JiraSdk\Endpoint;

class ParseJqlQueries extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Parses and validates JQL queries.

    Validation is performed in context of the current user.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None.
    *
    * @param \JiraSdk\Model\JqlQueriesToParse $requestBody
    * @param array $queryParameters {
    *     @var string $validation How to validate the JQL query and treat the validation results. Validation options include:

    *  `strict` Returns all errors. If validation fails, the query structure is not returned.
    *  `warn` Returns all errors. If validation fails but the JQL query is correctly formed, the query structure is returned.
    *  `none` No validation is performed. If JQL query is correctly formed, the query structure is returned.
    * }
    */
    public function __construct(\JiraSdk\Model\JqlQueriesToParse $requestBody, array $queryParameters = array())
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/jql/parse';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\JqlQueriesToParse) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
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
        $optionsResolver->setDefined(array('validation'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('validation' => 'strict'));
        $optionsResolver->addAllowedTypes('validation', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\ParseJqlQueriesBadRequestException
     * @throws \JiraSdk\Exception\ParseJqlQueriesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\ParsedJqlQueries
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ParsedJqlQueries', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\ParseJqlQueriesBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\ParseJqlQueriesUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
