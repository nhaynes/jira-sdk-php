<?php

namespace JiraSdk\Endpoint;

class RenameScreenTab extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    /**
     * Updates the name of a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param \JiraSdk\Model\ScreenableTab $requestBody
     */
    public function __construct(int $screenId, int $tabId, \JiraSdk\Model\ScreenableTab $requestBody)
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}', '{tabId}'), array($this->screenId, $this->tabId), '/rest/api/3/screens/{screenId}/tabs/{tabId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ScreenableTab) {
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
     * @throws \JiraSdk\Exception\RenameScreenTabBadRequestException
     * @throws \JiraSdk\Exception\RenameScreenTabUnauthorizedException
     * @throws \JiraSdk\Exception\RenameScreenTabForbiddenException
     * @throws \JiraSdk\Exception\RenameScreenTabNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableTab
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ScreenableTab', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\RenameScreenTabBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\RenameScreenTabUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\RenameScreenTabForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\RenameScreenTabNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
