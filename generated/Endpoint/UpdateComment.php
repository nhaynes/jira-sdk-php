<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Endpoint;

class UpdateComment extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $id;

    /**
     * Updates a comment.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue containing the comment is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Edit all comments*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any comment or *Edit own comments* to update comment created by the user.
     *  If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param string $id              the ID of the comment
     * @param array  $queryParameters {
     *
     *     @var bool $notifyUsers whether users are notified when a comment is updated
     *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect app users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
     * }
     */
    public function __construct(string $issueIdOrKey, string $id, \JiraSdk\Api\Model\Comment $requestBody, array $queryParameters = [])
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
        return str_replace(['{issueIdOrKey}', '{id}'], [$this->issueIdOrKey, $this->id], '/rest/api/3/issue/{issueIdOrKey}/comment/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\Comment) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['notifyUsers', 'overrideEditableFlag', 'expand']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['notifyUsers' => true, 'overrideEditableFlag' => false]);
        $optionsResolver->addAllowedTypes('notifyUsers', ['bool']);
        $optionsResolver->addAllowedTypes('overrideEditableFlag', ['bool']);
        $optionsResolver->addAllowedTypes('expand', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\Comment|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateCommentBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateCommentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateCommentNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Comment', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateCommentBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateCommentUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateCommentNotFoundException($response);
        }
    }
}
