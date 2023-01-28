<?php

namespace JiraSdk\Endpoint;

class UpdateIssueFieldOption extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldKey;
    protected $optionId;
    /**
    * Updates or creates an option for a select list issue field. This operation requires that the option ID is provided when creating an option, therefore, the option ID needs to be specified as a path and body parameter. The option ID provided in the path and body must be identical.

    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:

    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param int $optionId The ID of the option to be updated.
    * @param \JiraSdk\Model\IssueFieldOption $requestBody
    */
    public function __construct(string $fieldKey, int $optionId, \JiraSdk\Model\IssueFieldOption $requestBody)
    {
        $this->fieldKey = $fieldKey;
        $this->optionId = $optionId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldKey}', '{optionId}'), array($this->fieldKey, $this->optionId), '/rest/api/3/field/{fieldKey}/option/{optionId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueFieldOption) {
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
     * @throws \JiraSdk\Exception\UpdateIssueFieldOptionBadRequestException
     * @throws \JiraSdk\Exception\UpdateIssueFieldOptionForbiddenException
     * @throws \JiraSdk\Exception\UpdateIssueFieldOptionNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueFieldOption
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueFieldOption', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueFieldOptionBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueFieldOptionForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateIssueFieldOptionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
