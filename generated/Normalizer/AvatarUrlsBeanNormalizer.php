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

class AvatarUrlsBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\AvatarUrlsBean' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\AvatarUrlsBean' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\AvatarUrlsBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('16x16', $data)) {
            $object->set16x16($data['16x16']);
        }
        if (\array_key_exists('24x24', $data)) {
            $object->set24x24($data['24x24']);
        }
        if (\array_key_exists('32x32', $data)) {
            $object->set32x32($data['32x32']);
        }
        if (\array_key_exists('48x48', $data)) {
            $object->set48x48($data['48x48']);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('n16x16') && null !== $object->get16x16()) {
            $data['16x16'] = $object->get16x16();
        }
        if ($object->isInitialized('n24x24') && null !== $object->get24x24()) {
            $data['24x24'] = $object->get24x24();
        }
        if ($object->isInitialized('n32x32') && null !== $object->get32x32()) {
            $data['32x32'] = $object->get32x32();
        }
        if ($object->isInitialized('n48x48') && null !== $object->get48x48()) {
            $data['48x48'] = $object->get48x48();
        }

        return $data;
    }
}
