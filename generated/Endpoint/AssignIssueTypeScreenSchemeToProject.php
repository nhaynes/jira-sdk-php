<?php

namespace JiraSdk\Endpoint;

class AssignIssueTypeScreenSchemeToProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Assigns an issue type screen scheme to a project.

    Issue type screen schemes can only be assigned to classic projects.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\IssueTypeScreenSchemeProjectAssociation $requestBody
    */
    public function __construct(\JiraSdk\Model\IssueTypeScreenSchemeProjectAssociation $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/issuetypescreenscheme/project';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueTypeScreenSchemeProjectAssociation) {
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
     * @throws \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectBadRequestException
     * @throws \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectUnauthorizedException
     * @throws \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectForbiddenException
     * @throws \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectNotFoundException
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
            throw new \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
