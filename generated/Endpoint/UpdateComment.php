<?php

namespace JiraSdk\Endpoint;

class UpdateComment extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $id;
    /**
    * Updates a comment.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue containing the comment is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Edit all comments*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any comment or *Edit own comments* to update comment created by the user.
    *  If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $id The ID of the comment.
    * @param \JiraSdk\Model\Comment $requestBody
    * @param array $queryParameters {
    *     @var bool $notifyUsers Whether users are notified when a comment is updated.
    *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect app users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
    * }
    */
    public function __construct(string $issueIdOrKey, string $id, \JiraSdk\Model\Comment $requestBody, array $queryParameters = array())
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->id = $id;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{id}'), array($this->issueIdOrKey, $this->id), '/rest/api/3/issue/{issueIdOrKey}/comment/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\Comment) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
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
        $optionsResolver->setDefined(array('notifyUsers', 'overrideEditableFlag', 'expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('notifyUsers' => true, 'overrideEditableFlag' => false));
        $optionsResolver->addAllowedTypes('notifyUsers', array('bool'));
        $optionsResolver->addAllowedTypes('overrideEditableFlag', array('bool'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\UpdateCommentBadRequestException
     * @throws \JiraSdk\Exception\UpdateCommentUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateCommentNotFoundException
     *
     * @return null|\JiraSdk\Model\Comment
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Comment', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateCommentBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateCommentUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateCommentNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
