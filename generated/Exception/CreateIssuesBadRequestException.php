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

namespace JiraSdk\Api\Exception;

class CreateIssuesBadRequestException extends BadRequestException
{
    /**
     * @var \JiraSdk\Api\Model\CreatedIssues
     */
    private $createdIssues;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(\JiraSdk\Api\Model\CreatedIssues $createdIssues, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Returned if all requests are invalid. Requests may be unsuccessful when they:

 *  are missing required fields.
 *  contain invalid field values.
 *  contain fields that cannot be set for the issue type.
 *  are by a user who does not have the necessary permission.
 *  are to create a subtype in a project different that of the parent issue.
 *  is for a subtask when the option to create subtasks is disabled.
 *  are invalid for any other reason.');
        $this->createdIssues = $createdIssues;
        $this->response = $response;
    }

    public function getCreatedIssues(): \JiraSdk\Api\Model\CreatedIssues
    {
        return $this->createdIssues;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
