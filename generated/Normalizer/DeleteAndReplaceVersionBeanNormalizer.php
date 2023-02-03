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

class DeleteAndReplaceVersionBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\DeleteAndReplaceVersionBean' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\DeleteAndReplaceVersionBean' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\DeleteAndReplaceVersionBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('moveFixIssuesTo', $data)) {
            $object->setMoveFixIssuesTo($data['moveFixIssuesTo']);
        }
        if (\array_key_exists('moveAffectedIssuesTo', $data)) {
            $object->setMoveAffectedIssuesTo($data['moveAffectedIssuesTo']);
        }
        if (\array_key_exists('customFieldReplacementList', $data)) {
            $values = [];
            foreach ($data['customFieldReplacementList'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\CustomFieldReplacement', 'json', $context);
            }
            $object->setCustomFieldReplacementList($values);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('moveFixIssuesTo') && null !== $object->getMoveFixIssuesTo()) {
            $data['moveFixIssuesTo'] = $object->getMoveFixIssuesTo();
        }
        if ($object->isInitialized('moveAffectedIssuesTo') && null !== $object->getMoveAffectedIssuesTo()) {
            $data['moveAffectedIssuesTo'] = $object->getMoveAffectedIssuesTo();
        }
        if ($object->isInitialized('customFieldReplacementList') && null !== $object->getCustomFieldReplacementList()) {
            $values = [];
            foreach ($object->getCustomFieldReplacementList() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['customFieldReplacementList'] = $values;
        }

        return $data;
    }
}
