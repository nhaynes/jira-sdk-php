<?php

namespace JiraSdk\Endpoint;

class UpdateStatuses extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Updates statuses by ID.
     **[Permissions](#permissions) required:**
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *
     * @param \JiraSdk\Model\StatusUpdateRequest $requestBody
     */
    public function __construct(\JiraSdk\Model\StatusUpdateRequest $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/statuses';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\StatusUpdateRequest) {
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
     * @throws \JiraSdk\Exception\UpdateStatusesBadRequestException
     * @throws \JiraSdk\Exception\UpdateStatusesUnauthorizedException
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
            throw new \JiraSdk\Exception\UpdateStatusesBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateStatusesUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
