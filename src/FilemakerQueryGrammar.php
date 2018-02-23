<?php
/**
 * Created by PhpStorm.
 * User: Andrea
 * Date: 20/02/2018
 * Time: 15:51
 */

namespace Abram\Filemaker;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\Grammar;

class FilemakerQueryGrammar extends Grammar
{

    /**
     * Get the appropriate query parameter place-holder for a value.
     *
     * @param  mixed $value
     * @return string
     */
    public function parameter($value)
    {
        if ($this->isExpression($value))
            return $this->getValue($value);
        if (!is_numeric($value))
            $value = "'" . $value . "'";
        return $value;
    }

    /**
     * Compile the "limit" portions of the query.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     * @param  int $limit
     * @return string
     */
    protected function compileLimit(Builder $query, $limit)
    {
        return 'offset ' . ((int)$query->offset) . ' rows fetch first ' . ((int)$limit) . ' rows only';
    }

    /**
     * Compile the "offset" portions of the query.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     * @param  int $offset
     * @return string
     */
    protected function compileOffset(Builder $query, $offset)
    {
        return '';
    }

    /**
     * Wrap a single string in keyword identifiers.
     *
     * @param  string $value
     * @return string
     */
    protected function wrapValue($value)
    {
        return $value;
    }
}