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

namespace JiraSdk\Tests;

use JiraSdk\Api\Model\CreateProjectDetails;
use JiraSdk\Api\Model\ProjectIdentifiers;

class ProjectTest extends IntegrationTestCase
{
    /**
     * @covers \JiraSdk\Api\Client::getAllProjects
    */
    public function testGetAllProjects()
    {
        $client = $this->createClient();

        $projects = $client->getAllProjects();

        $this->assertIsArray($projects);
        $this->assertGreaterThan(0, count($projects));
    }

    /**
     * @covers \JiraSdk\Api\Client::createProject
    */
    public function testCreateProject()
    {
        $client = $this->createClient();

        $details = (new CreateProjectDetails())
            ->setKey('IT')
            ->setName('Integration Test')
            ->setDescription('This is a project created via an integration test')
            ->setProjectTypeKey('software')
            ->setLeadAccountId($this->getAccountId());

        $project = $client->createProject($details);

        $this->assertInstanceOf(ProjectIdentifiers::class, $project);
        $this->assertEquals('IT', $project->getKey());
    }

    /**
     * @covers \JiraSdk\Api\Client::deleteProject
     * @depends testCreateProject
     */
    public function testDeleteProject()
    {
        $client = $this->createClient();

        $response = $client->deleteProject('IT');

        $this->assertNull($response);
    }
}
