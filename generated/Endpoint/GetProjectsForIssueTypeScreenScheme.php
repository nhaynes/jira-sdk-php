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

class GetProjectsForIssueTypeScreenScheme extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueTypeScreenSchemeId;

    /**
     * Returns a [paginated](#pagination) list of projects associated with an issue type screen scheme.
     *
     * Only company-managed projects associated with an issue type screen scheme are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $issueTypeScreenSchemeId the ID of the issue type screen scheme
     * @param array $queryParameters         {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $query
     * }
     */
    public function __construct(int $issueTypeScreenSchemeId, array $queryParameters = [])
    {
        $this->issueTypeScreenSchemeId = $issueTypeScreenSchemeId;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{issueTypeScreenSchemeId}'], [$this->issueTypeScreenSchemeId], '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/project');
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
        $optionsResolver->setDefined(['startAt', 'maxResults', 'query']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50, 'query' => '']);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('query', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanProjectDetails|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectsForIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectsForIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectsForIssueTypeScreenSchemeForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanProjectDetails', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectsForIssueTypeScreenSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectsForIssueTypeScreenSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectsForIssueTypeScreenSchemeForbiddenException($response);
        }
    }
}
