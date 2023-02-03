<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Endpoint;

class GetFieldAutoCompleteForQueryString extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Returns the JQL search auto complete suggestions for a field.
     *
     * Suggestions can be obtained by providing:
     *
     *  `fieldName` to get a list of all values for the field.
     *  `fieldName` and `fieldValue` to get a list of values containing the text in `fieldValue`.
     *  `fieldName` and `predicateName` to get a list of all predicate values for the field.
     *  `fieldName`, `predicateName`, and `predicateValue` to get a list of predicate values containing the text in `predicateValue`.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $fieldName the name of the field
     *     @var string $fieldValue the partial field item name entered by the user
     *     @var string $predicateName The name of the [ CHANGED operator predicate](https://confluence.atlassian.com/x/hQORLQ#Advancedsearching-operatorsreference-CHANGEDCHANGED) for which the suggestions are generated. The valid predicate operators are *by*, *from*, and *to*.
     *     @var string $predicateValue The partial predicate item name entered by the user.
     * }
     */
    public function __construct(array $queryParameters = [])
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
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['fieldName', 'fieldValue', 'predicateName', 'predicateValue']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('fieldName', ['string']);
        $optionsResolver->addAllowedTypes('fieldValue', ['string']);
        $optionsResolver->addAllowedTypes('predicateName', ['string']);
        $optionsResolver->addAllowedTypes('predicateValue', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\AutoCompleteSuggestions|null
     *
     * @throws \JiraSdk\Api\Exception\GetFieldAutoCompleteForQueryStringBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFieldAutoCompleteForQueryStringUnauthorizedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\AutoCompleteSuggestions', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetFieldAutoCompleteForQueryStringBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetFieldAutoCompleteForQueryStringUnauthorizedException($response);
        }
    }
}
