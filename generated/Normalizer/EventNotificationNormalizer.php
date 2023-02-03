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

class EventNotificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\EventNotification' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\EventNotification' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\EventNotification();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('expand', $data)) {
            $object->setExpand($data['expand']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('notificationType', $data)) {
            $object->setNotificationType($data['notificationType']);
        }
        if (\array_key_exists('parameter', $data)) {
            $object->setParameter($data['parameter']);
        }
        if (\array_key_exists('recipient', $data)) {
            $object->setRecipient($data['recipient']);
        }
        if (\array_key_exists('group', $data)) {
            $object->setGroup($this->denormalizer->denormalize($data['group'], 'JiraSdk\\Api\\Model\\EventNotificationGroup', 'json', $context));
        }
        if (\array_key_exists('field', $data)) {
            $object->setField($this->denormalizer->denormalize($data['field'], 'JiraSdk\\Api\\Model\\EventNotificationField', 'json', $context));
        }
        if (\array_key_exists('emailAddress', $data)) {
            $object->setEmailAddress($data['emailAddress']);
        }
        if (\array_key_exists('projectRole', $data)) {
            $object->setProjectRole($this->denormalizer->denormalize($data['projectRole'], 'JiraSdk\\Api\\Model\\EventNotificationProjectRole', 'json', $context));
        }
        if (\array_key_exists('user', $data)) {
            $object->setUser($this->denormalizer->denormalize($data['user'], 'JiraSdk\\Api\\Model\\EventNotificationUser', 'json', $context));
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('expand') && null !== $object->getExpand()) {
            $data['expand'] = $object->getExpand();
        }
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if ($object->isInitialized('notificationType') && null !== $object->getNotificationType()) {
            $data['notificationType'] = $object->getNotificationType();
        }
        if ($object->isInitialized('parameter') && null !== $object->getParameter()) {
            $data['parameter'] = $object->getParameter();
        }
        if ($object->isInitialized('recipient') && null !== $object->getRecipient()) {
            $data['recipient'] = $object->getRecipient();
        }
        if ($object->isInitialized('group') && null !== $object->getGroup()) {
            $data['group'] = $this->normalizer->normalize($object->getGroup(), 'json', $context);
        }
        if ($object->isInitialized('field') && null !== $object->getField()) {
            $data['field'] = $this->normalizer->normalize($object->getField(), 'json', $context);
        }
        if ($object->isInitialized('emailAddress') && null !== $object->getEmailAddress()) {
            $data['emailAddress'] = $object->getEmailAddress();
        }
        if ($object->isInitialized('projectRole') && null !== $object->getProjectRole()) {
            $data['projectRole'] = $this->normalizer->normalize($object->getProjectRole(), 'json', $context);
        }
        if ($object->isInitialized('user') && null !== $object->getUser()) {
            $data['user'] = $this->normalizer->normalize($object->getUser(), 'json', $context);
        }

        return $data;
    }
}
