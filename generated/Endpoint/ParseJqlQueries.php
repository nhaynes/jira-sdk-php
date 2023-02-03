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

class ParseJqlQueries extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Parses and validates JQL queries.
     *
     * Validation is performed in context of the current user.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $validation How to validate the JQL query and treat the validation results. Validation options include:
     *
     *  `strict` Returns all errors. If validation fails, the query structure is not returned.
     *  `warn` Returns all errors. If validation fails but the JQL query is correctly formed, the query structure is returned.
     *  `none` No validation is performed. If JQL query is correctly formed, the query structure is returned.
     * }
     */
    public function __construct(\JiraSdk\Api\Model\JqlQueriesToParse $requestBody, array $queryParameters = [])
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
        if ($this->body instanceof \JiraSdk\Api\Model\JqlQueriesToParse) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

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
        $optionsResolver->setDefined(['validation']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['validation' => 'strict']);
        $optionsResolver->addAllowedTypes('validation', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\ParsedJqlQueries|null
     *
     * @throws \JiraSdk\Api\Exception\ParseJqlQueriesBadRequestException
     * @throws \JiraSdk\Api\Exception\ParseJqlQueriesUnauthorizedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ParsedJqlQueries', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\ParseJqlQueriesBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\ParseJqlQueriesUnauthorizedException($response);
        }
    }
}
