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

namespace JiraSdk\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Api\Runtime\Normalizer\CheckArray;
use JiraSdk\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ProjectLandingPageInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\ProjectLandingPageInfo' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\ProjectLandingPageInfo' === \get_class($data);
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Api\Model\ProjectLandingPageInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('url', $data)) {
            $object->setUrl($data['url']);
        }
        if (\array_key_exists('projectKey', $data)) {
            $object->setProjectKey($data['projectKey']);
        }
        if (\array_key_exists('projectType', $data)) {
            $object->setProjectType($data['projectType']);
        }
        if (\array_key_exists('boardId', $data)) {
            $object->setBoardId($data['boardId']);
        }
        if (\array_key_exists('boardName', $data)) {
            $object->setBoardName($data['boardName']);
        }
        if (\array_key_exists('simpleBoard', $data)) {
            $object->setSimpleBoard($data['simpleBoard']);
        }
        if (\array_key_exists('queueId', $data)) {
            $object->setQueueId($data['queueId']);
        }
        if (\array_key_exists('queueName', $data)) {
            $object->setQueueName($data['queueName']);
        }
        if (\array_key_exists('queueCategory', $data)) {
            $object->setQueueCategory($data['queueCategory']);
        }
        if (\array_key_exists('attributes', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['attributes'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setAttributes($values);
        }
        if (\array_key_exists('simplified', $data)) {
            $object->setSimplified($data['simplified']);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('url') && null !== $object->getUrl()) {
            $data['url'] = $object->getUrl();
        }
        if ($object->isInitialized('projectKey') && null !== $object->getProjectKey()) {
            $data['projectKey'] = $object->getProjectKey();
        }
        if ($object->isInitialized('projectType') && null !== $object->getProjectType()) {
            $data['projectType'] = $object->getProjectType();
        }
        if ($object->isInitialized('boardId') && null !== $object->getBoardId()) {
            $data['boardId'] = $object->getBoardId();
        }
        if ($object->isInitialized('boardName') && null !== $object->getBoardName()) {
            $data['boardName'] = $object->getBoardName();
        }
        if ($object->isInitialized('simpleBoard') && null !== $object->getSimpleBoard()) {
            $data['simpleBoard'] = $object->getSimpleBoard();
        }
        if ($object->isInitialized('queueId') && null !== $object->getQueueId()) {
            $data['queueId'] = $object->getQueueId();
        }
        if ($object->isInitialized('queueName') && null !== $object->getQueueName()) {
            $data['queueName'] = $object->getQueueName();
        }
        if ($object->isInitialized('queueCategory') && null !== $object->getQueueCategory()) {
            $data['queueCategory'] = $object->getQueueCategory();
        }
        if ($object->isInitialized('attributes') && null !== $object->getAttributes()) {
            $values = [];
            foreach ($object->getAttributes() as $key => $value) {
                $values[$key] = $value;
            }
            $data['attributes'] = $values;
        }
        if ($object->isInitialized('simplified') && null !== $object->getSimplified()) {
            $data['simplified'] = $object->getSimplified();
        }

        return $data;
    }
}
