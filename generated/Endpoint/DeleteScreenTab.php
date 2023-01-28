<?php

namespace JiraSdk\Endpoint;

class DeleteScreenTab extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    /**
     * Deletes a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     */
    public function __construct(int $screenId, int $tabId)
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}', '{tabId}'), array($this->screenId, $this->tabId), '/rest/api/3/screens/{screenId}/tabs/{tabId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteScreenTabUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteScreenTabForbiddenException
     * @throws \JiraSdk\Exception\DeleteScreenTabNotFoundException
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
            throw new \JiraSdk\Exception\DeleteScreenTabUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteScreenTabForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteScreenTabNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
