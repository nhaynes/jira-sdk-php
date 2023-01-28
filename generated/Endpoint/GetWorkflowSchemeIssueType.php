<?php

namespace JiraSdk\Endpoint;

class GetWorkflowSchemeIssueType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    protected $issueType;
    /**
     * Returns the issue type-workflow mapping for an issue type in a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme.
     * @param string $issueType The ID of the issue type.
     * @param array $queryParameters {
     *     @var bool $returnDraftIfExists Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true. If no draft exists, the mapping from the workflow scheme is returned.
     * }
     */
    public function __construct(int $id, string $issueType, array $queryParameters = array())
    {
        $this->id = $id;
        $this->issueType = $issueType;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}', '{issueType}'), array($this->id, $this->issueType), '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}');
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
        $optionsResolver->setDefined(array('returnDraftIfExists'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('returnDraftIfExists' => false));
        $optionsResolver->addAllowedTypes('returnDraftIfExists', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetWorkflowSchemeIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeIssueTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypeWorkflowMapping
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueTypeWorkflowMapping', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeIssueTypeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeIssueTypeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeIssueTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
