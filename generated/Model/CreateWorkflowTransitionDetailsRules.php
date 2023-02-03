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

namespace JiraSdk\Api\Model;

class CreateWorkflowTransitionDetailsRules extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The workflow conditions.
     *
     * @var CreateWorkflowTransitionRulesDetailsConditions
     */
    protected $conditions;
    /**
     * The workflow validators.
     *
     **Note:** The default permission validator is always added to the *initial* transition, as in:
     *
     * "validators": [
     * {
     * "type": "PermissionValidator",
     * "configuration": {
     * "permissionKey": "CREATE_ISSUES"
     * }
     * }
     * ]
     *
     * @var CreateWorkflowTransitionRule[]
     */
    protected $validators;
    /**
     * The workflow post functions.
     *
     **Note:** The default post functions are always added to the *initial* transition, as in:
     *
     * "postFunctions": [
     * {
     * "type": "IssueCreateFunction"
     * },
     * {
     * "type": "IssueReindexFunction"
     * },
     * {
     * "type": "FireIssueEventFunction",
     * "configuration": {
     * "event": {
     * "id": "1",
     * "name": "issue_created"
     * }
     * }
     * }
     * ]
     *
     **Note:** The default post functions are always added to the *global* and *directed* transitions, as in:
     *
     * "postFunctions": [
     * {
     * "type": "UpdateIssueStatusFunction"
     * },
     * {
     * "type": "CreateCommentFunction"
     * },
     * {
     * "type": "GenerateChangeHistoryFunction"
     * },
     * {
     * "type": "IssueReindexFunction"
     * },
     * {
     * "type": "FireIssueEventFunction",
     * "configuration": {
     * "event": {
     * "id": "13",
     * "name": "issue_generic"
     * }
     * }
     * }
     * ]
     *
     * @var CreateWorkflowTransitionRule[]
     */
    protected $postFunctions;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The workflow conditions.
     */
    public function getConditions(): CreateWorkflowTransitionRulesDetailsConditions
    {
        return $this->conditions;
    }

    /**
     * The workflow conditions.
     */
    public function setConditions(CreateWorkflowTransitionRulesDetailsConditions $conditions): self
    {
        $this->initialized['conditions'] = true;
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * The workflow validators.
     *
     **Note:** The default permission validator is always added to the *initial* transition, as in:
     *
     * "validators": [
     * {
     * "type": "PermissionValidator",
     * "configuration": {
     * "permissionKey": "CREATE_ISSUES"
     * }
     * }
     * ]
     *
     * @return CreateWorkflowTransitionRule[]
     */
    public function getValidators(): array
    {
        return $this->validators;
    }

    /**
     * The workflow validators.
     *
     **Note:** The default permission validator is always added to the *initial* transition, as in:
     *
     * "validators": [
     * {
     * "type": "PermissionValidator",
     * "configuration": {
     * "permissionKey": "CREATE_ISSUES"
     * }
     * }
     * ]
     *
     * @param CreateWorkflowTransitionRule[] $validators
     */
    public function setValidators(array $validators): self
    {
        $this->initialized['validators'] = true;
        $this->validators = $validators;

        return $this;
    }

    /**
     * The workflow post functions.
     *
     **Note:** The default post functions are always added to the *initial* transition, as in:
     *
     * "postFunctions": [
     * {
     * "type": "IssueCreateFunction"
     * },
     * {
     * "type": "IssueReindexFunction"
     * },
     * {
     * "type": "FireIssueEventFunction",
     * "configuration": {
     * "event": {
     * "id": "1",
     * "name": "issue_created"
     * }
     * }
     * }
     * ]
     *
     **Note:** The default post functions are always added to the *global* and *directed* transitions, as in:
     *
     * "postFunctions": [
     * {
     * "type": "UpdateIssueStatusFunction"
     * },
     * {
     * "type": "CreateCommentFunction"
     * },
     * {
     * "type": "GenerateChangeHistoryFunction"
     * },
     * {
     * "type": "IssueReindexFunction"
     * },
     * {
     * "type": "FireIssueEventFunction",
     * "configuration": {
     * "event": {
     * "id": "13",
     * "name": "issue_generic"
     * }
     * }
     * }
     * ]
     *
     * @return CreateWorkflowTransitionRule[]
     */
    public function getPostFunctions(): array
    {
        return $this->postFunctions;
    }

    /**
     * The workflow post functions.
     *
     **Note:** The default post functions are always added to the *initial* transition, as in:
     *
     * "postFunctions": [
     * {
     * "type": "IssueCreateFunction"
     * },
     * {
     * "type": "IssueReindexFunction"
     * },
     * {
     * "type": "FireIssueEventFunction",
     * "configuration": {
     * "event": {
     * "id": "1",
     * "name": "issue_created"
     * }
     * }
     * }
     * ]
     *
     **Note:** The default post functions are always added to the *global* and *directed* transitions, as in:
     *
     * "postFunctions": [
     * {
     * "type": "UpdateIssueStatusFunction"
     * },
     * {
     * "type": "CreateCommentFunction"
     * },
     * {
     * "type": "GenerateChangeHistoryFunction"
     * },
     * {
     * "type": "IssueReindexFunction"
     * },
     * {
     * "type": "FireIssueEventFunction",
     * "configuration": {
     * "event": {
     * "id": "13",
     * "name": "issue_generic"
     * }
     * }
     * }
     * ]
     *
     * @param CreateWorkflowTransitionRule[] $postFunctions
     */
    public function setPostFunctions(array $postFunctions): self
    {
        $this->initialized['postFunctions'] = true;
        $this->postFunctions = $postFunctions;

        return $this;
    }
}
