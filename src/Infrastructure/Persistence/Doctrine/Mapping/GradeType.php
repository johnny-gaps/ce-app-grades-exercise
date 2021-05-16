<?php

namespace CE\Infrastructure\Persistence\Doctrine\Mapping;

use CE\Domain\Model\Grade;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

class GradeType extends IntegerType
{
    const MY_TYPE = 'grade_type';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $className = Grade::class;

        return new $className($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->value();
    }

    public function getName()
    {
        return self::MY_TYPE;
    }
}
