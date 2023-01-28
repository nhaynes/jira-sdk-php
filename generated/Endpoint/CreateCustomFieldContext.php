<?php

namespace JiraSdk\Endpoint;

class CreateCustomFieldContext extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    /**
    * Creates a custom field context.

    If `projectIds` is empty, a global context is created. A global context is one that applies to all project. If `issueTypeIds` is empty, the context applies to all issue types.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param \JiraSdk\Model\CreateCustomFieldContext $requestBody
    */
    public function __construct(string $fieldId, \JiraSdk\Model\CreateCustomFieldContext $requestBody)
    {
        $this->fieldId = $fieldId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}'), array($this->fieldId), '/rest/api/3/field/{fieldId}/context');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\CreateCustomFieldContext) {
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
     * @throws \JiraSdk\Exception\CreateCustomFieldContextBadRequestException
     * @throws \JiraSdk\Exception\CreateCustomFieldContextUnauthorizedException
     * @throws \JiraSdk\Exception\CreateCustomFieldContextNotFoundException
     * @throws \JiraSdk\Exception\CreateCustomFieldContextConflictException
     *
     * @return null|\JiraSdk\Model\CreateCustomFieldContext
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\CreateCustomFieldContext', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\CreateCustomFieldContextBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateCustomFieldContextUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\CreateCustomFieldContextNotFoundException($response);
        }
        if (is_null($contentType) === false && (409 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\CreateCustomFieldContextConflictException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
