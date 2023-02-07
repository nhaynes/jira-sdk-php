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

use JiraSdk\Api\Model\Version;

class VersionTest extends IntegrationTestCase
{
    /**
     * @covers \JiraSdk\Api\Client::createVersion
     * @covers \JiraSdk\Api\Client::getAllVersions
     * @covers \JiraSdk\Api\Client::deleteVersion
     */
    public function testCreateVersion()
    {
        $project = $this->getProjectKey();
        $client = $this->createClient();

        $version = (new Version())
            ->setName('1.0.0')
            ->setDescription('A version created by an integration test.')
            ->setProject($project)
        ;

        $created = $client->createVersion($version);

        $this->assertEquals('1.0.0', $created->getName());

        $existing = $client->getProjectVersions($project);

        $this->assertCount(1, $existing);
        $this->assertEquals($created, $existing[0]);

        $response = $client->deleteVersion($created->getId());

        $this->assertNull($response);
    }
}
