<?php

namespace JiraSdk\Endpoint;

class AddScreenTabField extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    /**
     * Adds a field to a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param \JiraSdk\Model\AddFieldBean $requestBody
     */
    public function __construct(int $screenId, int $tabId, \JiraSdk\Model\AddFieldBean $requestBody)
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}', '{tabId}'), array($this->screenId, $this->tabId), '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\AddFieldBean) {
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
     * @throws \JiraSdk\Exception\AddScreenTabFieldBadRequestException
     * @throws \JiraSdk\Exception\AddScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Exception\AddScreenTabFieldForbiddenException
     * @throws \JiraSdk\Exception\AddScreenTabFieldNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableField
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ScreenableField', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\AddScreenTabFieldBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddScreenTabFieldUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\AddScreenTabFieldForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AddScreenTabFieldNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
