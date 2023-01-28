<?php

namespace JiraSdk\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Runtime\Normalizer\CheckArray;
use JiraSdk\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SoftwareNavigationInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\SoftwareNavigationInfo';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\SoftwareNavigationInfo';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Model\SoftwareNavigationInfo();
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
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
