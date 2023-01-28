<?php

namespace JiraSdk\Endpoint;

class GetProjectsForIssueTypeScreenScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueTypeScreenSchemeId;
    /**
    * Returns a [paginated](#pagination) list of projects associated with an issue type screen scheme.

    Only company-managed projects associated with an issue type screen scheme are returned.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeScreenSchemeId The ID of the issue type screen scheme.
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $query
    * }
    */
    public function __construct(int $issueTypeScreenSchemeId, array $queryParameters = array())
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
        return str_replace(array('{issueTypeScreenSchemeId}'), array($this->issueTypeScreenSchemeId), '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/project');
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'query'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50, 'query' => ''));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('query', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetProjectsForIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\GetProjectsForIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectsForIssueTypeScreenSchemeForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanProjectDetails
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanProjectDetails', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetProjectsForIssueTypeScreenSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetProjectsForIssueTypeScreenSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetProjectsForIssueTypeScreenSchemeForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
