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

class GetIssueTypeScreenSchemeProjectAssociations extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Returns a [paginated](#pagination) list of issue type screen schemes and, for each issue type screen scheme, a list of the projects that use it.
     *
     * Only issue type screen schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $projectId The list of project IDs. To include multiple projects, separate IDs with ampersand: `projectId=10000&projectId=10001`.
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
        return '/rest/api/3/issuetypescreenscheme/project';
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
        $optionsResolver->setDefined(['startAt', 'maxResults', 'projectId']);
        $optionsResolver->setRequired(['projectId']);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50]);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('projectId', ['array']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueTypeScreenSchemesProjects|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeProjectAssociationsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeProjectAssociationsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeProjectAssociationsForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanIssueTypeScreenSchemesProjects', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeProjectAssociationsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeProjectAssociationsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeProjectAssociationsForbiddenException($response);
        }
    }
}
