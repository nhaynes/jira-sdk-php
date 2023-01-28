<?php

namespace JiraSdk\Endpoint;

class MoveScreenTab extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    protected $pos;
    /**
     * Moves a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param int $pos The position of tab. The base index is 0.
     */
    public function __construct(int $screenId, int $tabId, int $pos)
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->pos = $pos;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}', '{tabId}', '{pos}'), array($this->screenId, $this->tabId, $this->pos), '/rest/api/3/screens/{screenId}/tabs/{tabId}/move/{pos}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\MoveScreenTabBadRequestException
     * @throws \JiraSdk\Exception\MoveScreenTabUnauthorizedException
     * @throws \JiraSdk\Exception\MoveScreenTabForbiddenException
     * @throws \JiraSdk\Exception\MoveScreenTabNotFoundException
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
            throw new \JiraSdk\Exception\MoveScreenTabBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\MoveScreenTabUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\MoveScreenTabForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\MoveScreenTabNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
