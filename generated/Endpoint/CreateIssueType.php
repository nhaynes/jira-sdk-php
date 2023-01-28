<?php

namespace JiraSdk\Endpoint;

class CreateIssueType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Creates an issue type and adds it to the default issue type scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\IssueTypeCreateBean $requestBody
     */
    public function __construct(\JiraSdk\Model\IssueTypeCreateBean $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/issuetype';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueTypeCreateBean) {
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
     * @throws \JiraSdk\Exception\CreateIssueTypeBadRequestException
     * @throws \JiraSdk\Exception\CreateIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\CreateIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\CreateIssueTypeConflictException
     *
     * @return null|\JiraSdk\Model\IssueTypeDetails
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueTypeDetails', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\CreateIssueTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateIssueTypeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\CreateIssueTypeForbiddenException($response);
        }
        if (409 === $status) {
            throw new \JiraSdk\Exception\CreateIssueTypeConflictException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
