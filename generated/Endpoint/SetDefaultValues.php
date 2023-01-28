<?php

namespace JiraSdk\Endpoint;

class SetDefaultValues extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    /**
    * Sets default for contexts of a custom field. Default are defined using these objects:

    *  `CustomFieldContextDefaultValueDate` (type `datepicker`) for date fields.
    *  `CustomFieldContextDefaultValueDateTime` (type `datetimepicker`) for date-time fields.
    *  `CustomFieldContextDefaultValueSingleOption` (type `option.single`) for single choice select lists and radio buttons.
    *  `CustomFieldContextDefaultValueMultipleOption` (type `option.multiple`) for multiple choice select lists and checkboxes.
    *  `CustomFieldContextDefaultValueCascadingOption` (type `option.cascading`) for cascading select lists.
    *  `CustomFieldContextSingleUserPickerDefaults` (type `single.user.select`) for single users.
    *  `CustomFieldContextDefaultValueMultiUserPicker` (type `multi.user.select`) for user lists.
    *  `CustomFieldContextDefaultValueSingleGroupPicker` (type `grouppicker.single`) for single choice group pickers.
    *  `CustomFieldContextDefaultValueMultipleGroupPicker` (type `grouppicker.multiple`) for multiple choice group pickers.
    *  `CustomFieldContextDefaultValueURL` (type `url`) for URLs.
    *  `CustomFieldContextDefaultValueProject` (type `project`) for project pickers.
    *  `CustomFieldContextDefaultValueFloat` (type `float`) for floats (floating-point numbers).
    *  `CustomFieldContextDefaultValueLabels` (type `labels`) for labels.
    *  `CustomFieldContextDefaultValueTextField` (type `textfield`) for text fields.
    *  `CustomFieldContextDefaultValueTextArea` (type `textarea`) for text area fields.
    *  `CustomFieldContextDefaultValueReadOnly` (type `readonly`) for read only (text) fields.
    *  `CustomFieldContextDefaultValueMultipleVersion` (type `version.multiple`) for single choice version pickers.
    *  `CustomFieldContextDefaultValueSingleVersion` (type `version.single`) for multiple choice version pickers.

    Forge custom fields [types](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types) are also supported, returning:

    *  `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields.
    *  `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields.
    *  `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields.
    *  `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields.
    *  `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields.
    *  `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields.
    *  `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields.
    *  `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields.
    *  `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields.

    Only one type of default object can be included in a request. To remove a default for a context, set the default parameter to `null`.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param \JiraSdk\Model\CustomFieldContextDefaultValueUpdate $requestBody
    */
    public function __construct(string $fieldId, \JiraSdk\Model\CustomFieldContextDefaultValueUpdate $requestBody)
    {
        $this->fieldId = $fieldId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}'), array($this->fieldId), '/rest/api/3/field/{fieldId}/context/defaultValue');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\CustomFieldContextDefaultValueUpdate) {
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
     * @throws \JiraSdk\Exception\SetDefaultValuesBadRequestException
     * @throws \JiraSdk\Exception\SetDefaultValuesUnauthorizedException
     * @throws \JiraSdk\Exception\SetDefaultValuesForbiddenException
     * @throws \JiraSdk\Exception\SetDefaultValuesNotFoundException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\SetDefaultValuesBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetDefaultValuesUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\SetDefaultValuesForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\SetDefaultValuesNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
