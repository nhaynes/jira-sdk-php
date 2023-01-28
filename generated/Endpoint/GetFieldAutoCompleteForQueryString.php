<?php

namespace JiraSdk\Endpoint;

class GetFieldAutoCompleteForQueryString extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns the JQL search auto complete suggestions for a field.

    Suggestions can be obtained by providing:

    *  `fieldName` to get a list of all values for the field.
    *  `fieldName` and `fieldValue` to get a list of values containing the text in `fieldValue`.
    *  `fieldName` and `predicateName` to get a list of all predicate values for the field.
    *  `fieldName`, `predicateName`, and `predicateValue` to get a list of predicate values containing the text in `predicateValue`.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None.
    *
    * @param array $queryParameters {
    *     @var string $fieldName The name of the field.
    *     @var string $fieldValue The partial field item name entered by the user.
    *     @var string $predicateName The name of the [ CHANGED operator predicate](https://confluence.atlassian.com/x/hQORLQ#Advancedsearching-operatorsreference-CHANGEDCHANGED) for which the suggestions are generated. The valid predicate operators are *by*, *from*, and *to*.
    *     @var string $predicateValue The partial predicate item name entered by the user.
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
        return '/rest/api/3/jql/autocompletedata/suggestions';
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
        $optionsResolver->setDefined(array('fieldName', 'fieldValue', 'predicateName', 'predicateValue'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('fieldName', array('string'));
        $optionsResolver->addAllowedTypes('fieldValue', array('string'));
        $optionsResolver->addAllowedTypes('predicateName', array('string'));
        $optionsResolver->addAllowedTypes('predicateValue', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetFieldAutoCompleteForQueryStringBadRequestException
     * @throws \JiraSdk\Exception\GetFieldAutoCompleteForQueryStringUnauthorizedException
     *
     * @return null|\JiraSdk\Model\AutoCompleteSuggestions
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\AutoCompleteSuggestions', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetFieldAutoCompleteForQueryStringBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetFieldAutoCompleteForQueryStringUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
