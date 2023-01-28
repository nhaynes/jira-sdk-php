<?php

namespace JiraSdk\Endpoint;

class GetWorkflowScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Returns a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*.
     * @param array $queryParameters {
     *     @var bool $returnDraftIfExists Returns the workflow scheme's draft rather than scheme itself, if set to true. If the workflow scheme does not have a draft, then the workflow scheme is returned.
     * }
     */
    public function __construct(int $id, array $queryParameters = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}');
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
     * @throws \JiraSdk\Exception\GetWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\WorkflowScheme', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
