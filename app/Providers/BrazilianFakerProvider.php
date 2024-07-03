<?php

namespace App\Providers;

class BrazilianFakerProvider
{
    public static function cpf($format = true)
    {
        $n = [];
        for ($i = 0; $i < 9; $i++) {
            $n[] = mt_rand(0, 9);
        }

        $n[9] = self::calculateDigit($n);
        $n[10] = self::calculateDigit($n);

        return $format ? self::formatCPF($n) : implode('', $n);
    }

    public static function cnpj($format = true)
    {
        $n = [];
        for ($i = 0; $i < 8; $i++) {
            $n[] = mt_rand(0, 9);
        }
        $n[] = 0;
        $n[] = 0;
        $n[] = 0;
        $n[] = 1;

        $n[12] = self::calculateDigit($n, 5);
        $n[13] = self::calculateDigit($n, 6);

        return $format ? self::formatCNPJ($n) : implode('', $n);
    }

    protected static function calculateDigit($n, $start = 2)
    {
        $sum = 0;
        for ($i = count($n) - 1, $j = $start; $i >= 0; $i--, $j++) {
            $sum += $n[$i] * $j;
            if ($j == 9) {
                $j = 1;
            }
        }

        $remainder = $sum % 11;
        return $remainder < 2 ? 0 : 11 - $remainder;
    }

    protected static function formatCPF($n)
    {
        return sprintf('%03d.%03d.%03d-%02d', $n[0], $n[1], $n[2], $n[3], $n[4], $n[5], $n[6], $n[7], $n[8], $n[9], $n[10]);
    }

    protected static function formatCNPJ($n)
    {
        return sprintf('%02d.%03d.%03d/%04d-%02d', $n[0], $n[1], $n[2], $n[3], $n[4], $n[5], $n[6], $n[7], $n[8], $n[9], $n[10], $n[11], $n[12], $n[13]);
    }
}
