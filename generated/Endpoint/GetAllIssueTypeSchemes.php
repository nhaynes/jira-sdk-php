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

class GetAllIssueTypeSchemes extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Returns a [paginated](#pagination) list of issue type schemes.
     *
     * Only issue type schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id The list of issue type schemes IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `name` Sorts by issue type scheme name.
     *  `id` Sorts by issue type scheme ID.
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `projects` For each issue type schemes, returns information about the projects the issue type scheme is assigned to.
     *  `issueTypes` For each issue type schemes, returns information about the issueTypes the issue type scheme have.
     *     @var string $queryString String used to perform a case-insensitive partial match with issue type scheme name.
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
        return '/rest/api/3/issuetypescheme';
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
        $optionsResolver->setDefined(['startAt', 'maxResults', 'id', 'orderBy', 'expand', 'queryString']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50, 'orderBy' => 'id', 'expand' => '', 'queryString' => '']);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('id', ['array']);
        $optionsResolver->addAllowedTypes('orderBy', ['string']);
        $optionsResolver->addAllowedTypes('expand', ['string']);
        $optionsResolver->addAllowedTypes('queryString', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueTypeScheme|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllIssueTypeSchemesBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAllIssueTypeSchemesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllIssueTypeSchemesForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanIssueTypeScheme', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetAllIssueTypeSchemesBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetAllIssueTypeSchemesUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetAllIssueTypeSchemesForbiddenException($response);
        }
    }
}
