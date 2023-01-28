<?php

namespace JiraSdk\Endpoint;

class SetWorklogProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $worklogId;
    protected $propertyKey;
    /**
    * Sets the value of a worklog property. Use this operation to store custom data against the worklog.

    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Edit all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any worklog or *Edit own worklogs* to update worklogs created by the user.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $worklogId The ID of the worklog.
    * @param string $propertyKey The key of the issue property. The maximum length is 255 characters.
    * @param mixed $requestBody
    */
    public function __construct(string $issueIdOrKey, string $worklogId, string $propertyKey, $requestBody)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->worklogId = $worklogId;
        $this->propertyKey = $propertyKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{worklogId}', '{propertyKey}'), array($this->issueIdOrKey, $this->worklogId, $this->propertyKey), '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (isset($this->body)) {
            return array(array('Content-Type' => array('application/json')), json_encode($this->body));
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
     * @throws \JiraSdk\Exception\SetWorklogPropertyBadRequestException
     * @throws \JiraSdk\Exception\SetWorklogPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\SetWorklogPropertyForbiddenException
     * @throws \JiraSdk\Exception\SetWorklogPropertyNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\SetWorklogPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetWorklogPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SetWorklogPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SetWorklogPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
