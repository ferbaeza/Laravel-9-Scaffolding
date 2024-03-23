<?php

namespace Baezeta\Console\Scaffolding\Context\Constants;

class ScaffoldingConstanst
{
    public const APPLICATION = 'Application';
    public const DOMAIN = 'Domain';
    public const COLLECTION = 'Domain/Collection';
    public const ENTITY = 'Domain/Entity';
    public const EXCEPTION = 'Domain/Exception';
    public const INTERFACES = 'Domain/Interfaces';
    public const INFRASTRUCTURE = 'Infrastructure';
    public const BINDINGS = 'Infrastructure/Bindings';
    public const DATASOURCE = 'Infrastructure/Datasource';
    public const HTTP = 'Infrastructure/Http';

    public static function carpetas()
    {
        return [
            self::APPLICATION,
            self::DOMAIN,
            self::COLLECTION,
            self::ENTITY,
            self::EXCEPTION,
            self::INTERFACES,
            self::INFRASTRUCTURE,
            self::BINDINGS,
            self::DATASOURCE,
            self::HTTP,
        ];
    }
}
