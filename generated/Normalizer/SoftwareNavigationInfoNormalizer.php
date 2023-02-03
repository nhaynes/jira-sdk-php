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

class SoftwareNavigationInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\SoftwareNavigationInfo' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\SoftwareNavigationInfo' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\SoftwareNavigationInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('boardId', $data)) {
            $object->setBoardId($data['boardId']);
            unset($data['boardId']);
        }
        if (\array_key_exists('boardName', $data)) {
            $object->setBoardName($data['boardName']);
            unset($data['boardName']);
        }
        if (\array_key_exists('totalBoardsInProject', $data)) {
            $object->setTotalBoardsInProject($data['totalBoardsInProject']);
            unset($data['totalBoardsInProject']);
        }
        if (\array_key_exists('simpleBoard', $data)) {
            $object->setSimpleBoard($data['simpleBoard']);
            unset($data['simpleBoard']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('boardId') && null !== $object->getBoardId()) {
            $data['boardId'] = $object->getBoardId();
        }
        if ($object->isInitialized('boardName') && null !== $object->getBoardName()) {
            $data['boardName'] = $object->getBoardName();
        }
        if ($object->isInitialized('totalBoardsInProject') && null !== $object->getTotalBoardsInProject()) {
            $data['totalBoardsInProject'] = $object->getTotalBoardsInProject();
        }
        if ($object->isInitialized('simpleBoard') && null !== $object->getSimpleBoard()) {
            $data['simpleBoard'] = $object->getSimpleBoard();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
