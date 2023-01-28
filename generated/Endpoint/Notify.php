<?php

namespace JiraSdk\Endpoint;

class Notify extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
     * Creates an email notification for an issue and adds it to the mail queue.
     **[Permissions](#permissions) required:**
     *  *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey ID or key of the issue that the notification is sent for.
     * @param \JiraSdk\Model\Notification $requestBody
     */
    public function __construct(string $issueIdOrKey, \JiraSdk\Model\Notification $requestBody)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}/notify');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\Notification) {
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
     * @throws \JiraSdk\Exception\NotifyBadRequestException
     * @throws \JiraSdk\Exception\NotifyForbiddenException
     * @throws \JiraSdk\Exception\NotifyNotFoundException
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
            throw new \JiraSdk\Exception\NotifyBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\NotifyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\NotifyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
