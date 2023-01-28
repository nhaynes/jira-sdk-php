<?php

namespace JiraSdk\Endpoint;

class CreateIssueFieldOption extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldKey;
    /**
    * Creates an option for a select list issue field.

    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:

    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param \JiraSdk\Model\IssueFieldOptionCreateBean $requestBody
    */
    public function __construct(string $fieldKey, \JiraSdk\Model\IssueFieldOptionCreateBean $requestBody)
    {
        $this->fieldKey = $fieldKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldKey}'), array($this->fieldKey), '/rest/api/3/field/{fieldKey}/option');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueFieldOptionCreateBean) {
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
     * @throws \JiraSdk\Exception\CreateIssueFieldOptionBadRequestException
     * @throws \JiraSdk\Exception\CreateIssueFieldOptionForbiddenException
     * @throws \JiraSdk\Exception\CreateIssueFieldOptionNotFoundException
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
            throw new \JiraSdk\Exception\CreateIssueFieldOptionBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\CreateIssueFieldOptionForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\CreateIssueFieldOptionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
