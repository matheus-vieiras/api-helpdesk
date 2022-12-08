<?php

declare(strict_types=1);

namespace App\Helpers;

use http\Exception\InvalidArgumentException;

class OrderByHelper
{   //tratar a ordenação
    public static function treatOrderBy(string $orderBy): array
    {
        $orderByArray = [];

        foreach (explode(',', $orderBy) as $value) {
            $value = trim($value); //remover os espaços
            // expressão regular para o orderby seguir estritamente a aplicacao
            if (!preg_match("/^(-)?[A-Za-z0-9_]+$/", $value)) {
                throw new InvalidArgumentException('O parâmetro "order_by" não está em um formato válido');
            }

            $orderByArray[$value] = 'ASC';

            if (strstr($value, '-')) {
                $orderByArray[$value] = 'DESC';
            }
        }

        return $orderByArray;
    }
}
