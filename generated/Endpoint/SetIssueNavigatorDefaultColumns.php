<?php

namespace JiraSdk\Endpoint;

class SetIssueNavigatorDefaultColumns extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Sets the default issue navigator columns.

    The `columns` parameter accepts a navigable field value and is expressed as HTML form data. To specify multiple columns, pass multiple `columns` parameters. For example, in curl:

    `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/settings/columns`

    If no column details are sent, then all default columns are removed.

    A navigable field is one that can be used as a column on the issue navigator. Find details of navigable issue columns using [Get fields](#api-rest-api-3-field-get).

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param null|array[] $requestBody
    */
    public function __construct(?array $requestBody = null)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/settings/columns';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (is_array($this->body) and isset($this->body[0]) and is_array($this->body[0])) {
            return array(array('Content-Type' => array('*/*')), $this->body);
        }
        if (is_array($this->body) and isset($this->body[0]) and is_array($this->body[0])) {
            $bodyBuilder = new \Http\Message\MultipartStream\MultipartStreamBuilder($streamFactory);
            $formParameters = $serializer->normalize($this->body, 'json');
            foreach ($formParameters as $key => $value) {
                $value = is_int($value) ? (string) $value : $value;
                $bodyBuilder->addResource($key, $value);
            }
            return array(array('Content-Type' => array('multipart/form-data; boundary="' . ($bodyBuilder->getBoundary() . '""'))), $bodyBuilder->build());
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
     * @throws \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsBadRequestException
     * @throws \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsUnauthorizedException
     * @throws \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsForbiddenException
     * @throws \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth');
    }
}
