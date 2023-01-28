<?php

namespace JiraSdk\Endpoint;

class BulkDeleteIssueProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $propertyKey;
    /**
    * Deletes a property value from multiple issues. The issues to be updated can be specified by filter criteria.

    The criteria the filter used to identify eligible issues are:

    *  `entityIds` Only issues from this list are eligible.
    *  `currentValue` Only issues with the property set to this value are eligible.

    If both criteria is specified, they are joined with the logical *AND*: only issues that satisfy both criteria are considered eligible.

    If no filter criteria are specified, all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible.

    This operation is:

    *  transactional, either the property is deleted from all eligible issues or, when errors occur, no properties are deleted.
    *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [ project permission](https://confluence.atlassian.com/x/yodKLg) for each project containing issues.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for each issue.
    *
    * @param string $propertyKey The key of the property.
    * @param \JiraSdk\Model\IssueFilterForBulkPropertyDelete $requestBody
    */
    public function __construct(string $propertyKey, \JiraSdk\Model\IssueFilterForBulkPropertyDelete $requestBody)
    {
        $this->propertyKey = $propertyKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{propertyKey}'), array($this->propertyKey), '/rest/api/3/issue/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueFilterForBulkPropertyDelete) {
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
     * @throws \JiraSdk\Exception\BulkDeleteIssuePropertyBadRequestException
     * @throws \JiraSdk\Exception\BulkDeleteIssuePropertyUnauthorizedException
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
            throw new \JiraSdk\Exception\BulkDeleteIssuePropertyBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\BulkDeleteIssuePropertyUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
