<?php

namespace Scienta\DoctrineJsonFunctions\Query\AST\Functions\Mysql;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\ORM\Query\SqlWalker;
use Scienta\DoctrineJsonFunctions\Query\AST\Functions\AbstractJsonFunctionNode;

abstract class MysqlJsonFunctionNode extends AbstractJsonFunctionNode
{
    /**
     * @param SqlWalker $sqlWalker
     * @throws DBALException
     */
    protected function validatePlatform(SqlWalker$sqlWalker): void
    {
        if (!$sqlWalker->getConnection()->getDatabasePlatform() instanceof MySqlPlatform) {
            throw DBALException::notSupported(static::FUNCTION_NAME);
        }
    }
}
