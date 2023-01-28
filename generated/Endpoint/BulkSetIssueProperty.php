<?php

namespace JiraSdk\Endpoint;

class BulkSetIssueProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $propertyKey;
    /**
    * Sets a property value on multiple issues.

    The value set can be a constant or determined by a [Jira expression](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/). Expressions must be computable with constant complexity when applied to a set of issues. Expressions must also comply with the [restrictions](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions) that apply to all Jira expressions.

    The issues to be updated can be specified by a filter.

    The filter identifies issues eligible for update using these criteria:

    *  `entityIds` Only issues from this list are eligible.
    *  `currentValue` Only issues with the property set to this value are eligible.
    *  `hasProperty`:

        *  If *true*, only issues with the property are eligible.
        *  If *false*, only issues without the property are eligible.

    If more than one criteria is specified, they are joined with the logical *AND*: only issues that satisfy all criteria are eligible.

    If an invalid combination of criteria is provided, an error is returned. For example, specifying a `currentValue` and `hasProperty` as *false* would not match any issues (because without the property the property cannot have a value).

    The filter is optional. Without the filter all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible.

    This operation is:

    *  transactional, either all eligible issues are updated or, when errors occur, none are updated.
    *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for each project containing issues.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for each issue.
    *
    * @param string $propertyKey The key of the property. The maximum length is 255 characters.
    * @param \JiraSdk\Model\BulkIssuePropertyUpdateRequest $requestBody
    */
    public function __construct(string $propertyKey, \JiraSdk\Model\BulkIssuePropertyUpdateRequest $requestBody)
    {
        $this->propertyKey = $propertyKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{propertyKey}'), array($this->propertyKey), '/rest/api/3/issue/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\BulkIssuePropertyUpdateRequest) {
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
     * @throws \JiraSdk\Exception\BulkSetIssuePropertyBadRequestException
     * @throws \JiraSdk\Exception\BulkSetIssuePropertyUnauthorizedException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (303 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\BulkSetIssuePropertyBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\BulkSetIssuePropertyUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
