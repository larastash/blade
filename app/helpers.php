<?php

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Number;

if (! function_exists('user')) {
    /**
     * Получить текущего аутентифицированного пользователя из указанного guard.
     *
     * @param  string|null  $guard  Имя guard аутентификации (необязательно)
     * @return User|Authenticatable|null Экземпляр аутентифицированного пользователя или null, если пользователь не аутентифицирован
     */
    function user(?string $guard = null): User|Authenticatable|null
    {
        if ($guard) {
            return Auth::guard($guard)->user();
        }

        /** @var User|null $user */
        $user = Auth::user();

        return $user;
    }
}

if (! function_exists('plural')) {
    /**
     * Получить правильную форму множественного числа слова в зависимости от заданного числа (русский язык).
     *
     * Учитывает правила образования множественного числа в русском языке:
     * - Форма 0: именительный падеж единственного числа (1, 21, 31... но не 11)
     * - Форма 1: родительный падеж единственного числа (2–4, 22–24... но не 12–14)
     * - Форма 2: родительный падеж множественного числа (0, 5–20, 25–30...)
     *
     * @param  int|float  $n  Число, по которому определяется форма множественного числа
     * @param  array<int, string>  $forms  Массив форм слова [именительный падеж ед. ч., родительный падеж ед. ч., родительный падеж мн. ч.]
     * @param  bool  $includeNumber  Добавлять ли число перед результатом
     * @return string Отформатированная строка с правильной формой множественного числа
     *
     * @example plural(1, ['яблоко', 'яблока', 'яблок']) // "1 яблоко"
     * @example plural(5, ['яблоко', 'яблока', 'яблок']) // "5 яблок"
     * @example plural(2, ['день', 'дня', 'дней'], false) // "дня"
     * @example plural(0, ['товар', 'товара', 'товаров']) // "0 товаров"
     * @example plural(1.5, ['яблоко', 'яблока', 'яблок']) // "1.5 яблока"
     */
    function plural(int|float $n, array $forms, bool $includeNumber = true): string
    {
        if (count($forms) !== 3) {
            throw new InvalidArgumentException('Forms array must contain exactly 3 elements');
        }

        $absN = abs($n);

        if (is_float($absN)) {
            $word = $forms[1];
        } else {
            $lastDigit = $absN % 10;
            $lastTwoDigits = $absN % 100;

            if ($lastDigit == 1 && $lastTwoDigits != 11) {
                $word = $forms[0];
            } elseif ($lastDigit >= 2 && $lastDigit <= 4 &&
                    ($lastTwoDigits < 10 || $lastTwoDigits >= 20)) {
                $word = $forms[1];
            } else {
                $word = $forms[2];
            }
        }

        return $includeNumber ? $n.' '.$word : $word;
    }
}

if (! function_exists('money')) {
    /**
     * Форматирует число как денежную сумму с символом валюты.
     *
     * Обёртка над Laravel `Number::currency()`, использующая расширение `intl`.
     * По умолчанию форматирует в рублях с российской локалью.
     *
     * @param  int|float  $number  Сумма для форматирования
     * @param  string  $in  Код валюты ISO 4217 (RUB, USD, EUR, ...)
     * @param  string|null  $locale  Локаль форматирования (null — взять локаль приложения)
     * @param  int|null  $precision  Количество знаков после запятой (null — по умолчанию для валюты)
     * @return string|false Отформатированная строка с символом валюты
     *
     * @example money(1234.5) // "1 234,50 ₽"
     * @example money(1234.5, 'USD', 'en_US') // "$1,234.50"
     * @example money(1000, 'RUB', 'ru_RU', 0) // "1 000 ₽"
     * @example money(1234.567, 'EUR', 'de_DE', 3) // "1.234,567 €"
     */
    function money(
        int|float $number,
        string $in = 'RUB',
        ?string $locale = 'ru_RU',
        ?int $precision = null
    ): string|false {
        return Number::currency($number, $in, $locale, $precision);
    }
}
