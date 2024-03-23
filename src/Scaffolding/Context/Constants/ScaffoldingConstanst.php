<?php

namespace Baezeta\Console\Scaffolding\Context\Constants;

class ScaffoldingConstanst
{
    const APPLICATION = 'Application';
    const DOMAIN = 'Domain';
    const COLLECTION = 'Domain/Collection';
    const ENTITY = 'Domain/Entity';
    const EXCEPTION = 'Domain/Exception';
    const INTERFACES = 'Domain/Interfaces';
    const INFRASTRUCTURE = 'Infrastructure';
    const BINDINGS = 'Infrastructure/Bindings';
    const DATASOURCE = 'Infrastructure/Datasource';
    const HTTP = 'Infrastructure/Http';

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
