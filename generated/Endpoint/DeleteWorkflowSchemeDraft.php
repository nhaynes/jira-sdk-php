<?php

namespace JiraSdk\Endpoint;

class DeleteWorkflowSchemeDraft extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Deletes a draft workflow scheme.
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
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}/draft');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeDraftUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeDraftForbiddenException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeDraftNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowSchemeDraftUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowSchemeDraftForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowSchemeDraftNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
