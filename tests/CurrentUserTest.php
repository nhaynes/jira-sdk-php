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
use JiraSdk\Api\Model\User;

class CurrentUserTest extends IntegrationTestCase
{
    /**
     * @covers \JiraSdk\Api\Client::getCurrentUser
    */
    public function testGetAllProjects()
    {
        $client = $this->createClient();

        $user = $client->getCurrentUser();

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($this->getAccountId(), $user->getAccountId());
    }
}
