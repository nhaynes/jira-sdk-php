<?php

namespace JiraSdk\Endpoint;

class MoveScreenTabField extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    protected $id;
    /**
    * Moves a screen tab field.

    If `after` and `position` are provided in the request, `position` is ignored.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $screenId The ID of the screen.
    * @param int $tabId The ID of the screen tab.
    * @param string $id The ID of the field.
    * @param \JiraSdk\Model\MoveFieldBean $requestBody
    */
    public function __construct(int $screenId, int $tabId, string $id, \JiraSdk\Model\MoveFieldBean $requestBody)
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->id = $id;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}', '{tabId}', '{id}'), array($this->screenId, $this->tabId, $this->id), '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields/{id}/move');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\MoveFieldBean) {
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
     * @throws \JiraSdk\Exception\MoveScreenTabFieldBadRequestException
     * @throws \JiraSdk\Exception\MoveScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Exception\MoveScreenTabFieldForbiddenException
     * @throws \JiraSdk\Exception\MoveScreenTabFieldNotFoundException
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
            throw new \JiraSdk\Exception\MoveScreenTabFieldBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\MoveScreenTabFieldUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\MoveScreenTabFieldForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\MoveScreenTabFieldNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
