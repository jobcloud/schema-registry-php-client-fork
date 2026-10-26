<?php

declare(strict_types=1);

namespace FlixTech\SchemaRegistryApi\Exception;

class IncompatibleAvroSchemaException extends AbstractSchemaRegistryException
{
    public const ERROR_CODE = 409;

    // Newer Schema Registry versions report incompatible schemas with this code instead of 409
    public const ERROR_CODE_INCOMPATIBLE_SCHEMA = 40901;
}
