<?php

namespace JiraSdk\Endpoint;

class UpdateIssueType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Updates the issue type.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id The ID of the issue type.
     * @param \JiraSdk\Model\IssueTypeUpdateBean $requestBody
     */
    public function __construct(string $id, \JiraSdk\Model\IssueTypeUpdateBean $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/issuetype/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueTypeUpdateBean) {
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
     * @throws \JiraSdk\Exception\UpdateIssueTypeBadRequestException
     * @throws \JiraSdk\Exception\UpdateIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\UpdateIssueTypeNotFoundException
     * @throws \JiraSdk\Exception\UpdateIssueTypeConflictException
     *
     * @return null|\JiraSdk\Model\IssueTypeDetails
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueTypeDetails', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueTypeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueTypeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueTypeNotFoundException($response);
        }
        if (409 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueTypeConflictException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}