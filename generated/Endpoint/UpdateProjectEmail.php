<?php

namespace JiraSdk\Endpoint;

class UpdateProjectEmail extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectId;
    /**
    * Sets the [project's sender email address](https://confluence.atlassian.com/x/dolKLg).

    If `emailAddress` is an empty string, the default email address is restored.

    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param int $projectId The project ID.
    * @param \JiraSdk\Model\ProjectEmailAddress $requestBody
    */
    public function __construct(int $projectId, \JiraSdk\Model\ProjectEmailAddress $requestBody)
    {
        $this->projectId = $projectId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectId}'), array($this->projectId), '/rest/api/3/project/{projectId}/email');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ProjectEmailAddress) {
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
     * @throws \JiraSdk\Exception\UpdateProjectEmailBadRequestException
     * @throws \JiraSdk\Exception\UpdateProjectEmailUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateProjectEmailForbiddenException
     * @throws \JiraSdk\Exception\UpdateProjectEmailNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectEmailBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectEmailUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectEmailForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectEmailNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
