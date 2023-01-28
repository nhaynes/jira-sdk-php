<?php

namespace JiraSdk\Endpoint;

class RemoveScreenTabField extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    protected $id;
    /**
     * Removes a field from a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param string $id The ID of the field.
     */
    public function __construct(int $screenId, int $tabId, string $id)
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}', '{tabId}', '{id}'), array($this->screenId, $this->tabId, $this->id), '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\RemoveScreenTabFieldBadRequestException
     * @throws \JiraSdk\Exception\RemoveScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveScreenTabFieldForbiddenException
     * @throws \JiraSdk\Exception\RemoveScreenTabFieldNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\RemoveScreenTabFieldBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\RemoveScreenTabFieldUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\RemoveScreenTabFieldForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\RemoveScreenTabFieldNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
