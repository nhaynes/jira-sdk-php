<?php

namespace JiraSdk\Endpoint;

class GetWorkflowSchemeDraft extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns the draft workflow scheme for an active workflow scheme. Draft workflow schemes allow changes to be made to the active workflow schemes: When an active workflow scheme is updated, a draft copy is created. The draft is modified, then the changes in the draft are copied back to the active workflow scheme. See [Configuring workflow schemes](https://confluence.atlassian.com/x/tohKLg) for more information.
    Note that:

    *  Only active workflow schemes can have draft workflow schemes.
    *  An active workflow scheme can only have one draft workflow scheme.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the active workflow scheme that the draft was created from.
    */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}/draft');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftNotFoundException
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
            throw new \JiraSdk\Exception\GetWorkflowSchemeDraftUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeDraftForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeDraftNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
