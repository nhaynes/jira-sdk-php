<?php

namespace JiraSdk\Endpoint;

class AssignProjectsToCustomFieldContext extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    protected $contextId;
    /**
    * Assigns a custom field context to projects.

    If any project in the request is assigned to any context of the custom field, the operation fails.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\ProjectIds $requestBody
    */
    public function __construct(string $fieldId, int $contextId, \JiraSdk\Model\ProjectIds $requestBody)
    {
        $this->fieldId = $fieldId;
        $this->contextId = $contextId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}', '{contextId}'), array($this->fieldId, $this->contextId), '/rest/api/3/field/{fieldId}/context/{contextId}/project');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ProjectIds) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AssignProjectsToCustomFieldContextBadRequestException
     * @throws \JiraSdk\Exception\AssignProjectsToCustomFieldContextUnauthorizedException
     * @throws \JiraSdk\Exception\AssignProjectsToCustomFieldContextForbiddenException
     * @throws \JiraSdk\Exception\AssignProjectsToCustomFieldContextNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AssignProjectsToCustomFieldContextBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AssignProjectsToCustomFieldContextUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AssignProjectsToCustomFieldContextForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AssignProjectsToCustomFieldContextNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
