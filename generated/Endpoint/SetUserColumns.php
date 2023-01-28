<?php

namespace JiraSdk\Endpoint;

class SetUserColumns extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Sets the default [ issue table columns](https://confluence.atlassian.com/x/XYdKLg) for the user. If an account ID is not passed, the calling user's default columns are set. If no column details are sent, then all default columns are removed.

    The parameters for this resource are expressed as HTML form data. For example, in curl:

    `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/user/columns?accountId=5b10ac8d82e05b22cc7d4ef5'`

    **[Permissions](#permissions) required:**

    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to set the columns on any user.
    *  Permission to access Jira, to set the calling user's columns.
    *
    * @param null|array[] $requestBody
    * @param array $queryParameters {
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
    * }
    */
    public function __construct(?array $requestBody = null, array $queryParameters = array())
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/user/columns';
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
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('accountId'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('accountId', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\SetUserColumnsUnauthorizedException
     * @throws \JiraSdk\Exception\SetUserColumnsForbiddenException
     * @throws \JiraSdk\Exception\SetUserColumnsNotFoundException
     * @throws \JiraSdk\Exception\SetUserColumnsTooManyRequestsException
     * @throws \JiraSdk\Exception\SetUserColumnsInternalServerErrorException
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
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetUserColumnsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SetUserColumnsForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SetUserColumnsNotFoundException($response);
        }
        if (429 === $status) {
            throw new \JiraSdk\Exception\SetUserColumnsTooManyRequestsException($response);
        }
        if (500 === $status) {
            throw new \JiraSdk\Exception\SetUserColumnsInternalServerErrorException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth');
    }
}
