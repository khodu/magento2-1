<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\DataObject;

use Ramsey\Uuid\Uuid;

/**
 * Class IdentityService
 */
class IdentityService implements IdentityGeneratorInterface
{
    /**
     * @var \Ramsey\Uuid\UuidFactoryInterface
     */
    private $uuidFactory;

    /**
     * IdentityService constructor.
     * @param \Ramsey\Uuid\UuidFactory $uuidFactory
     */
    public function __construct(
        \Ramsey\Uuid\UuidFactory $uuidFactory
    ) {
        $this->uuidFactory = $uuidFactory;
    }

    /**
     * @inheritDoc
     */
    public function generateId()
    {
        $uuid = $this->uuidFactory->uuid4();
        return $uuid->toString();
    }

    /**
     * @inheritDoc
     */
    public function generateIdForData($data)
    {
        $uuid = $this->uuidFactory->uuid3(Uuid::NAMESPACE_DNS, $data);
        return $uuid->toString();
    }
}