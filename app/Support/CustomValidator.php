<?php

namespace App\Support;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
     /**
     * パスワードの長さチェック
     */
    public function validatePasswordBetween($attribute, $value, $parameters)
    {
        $min = $parameters[0];
        $max = $parameters[1];

        $len = strlen($value);

        if ($len < $min || $len > $max) {
            return false;
        }

        return true;
    }

    /**
     * パスワードの長さチェックのメッセージの置換
     */
    protected function replacePasswordBetween($message, $attribute, $rule, $parameters)
    {
        $message = str_replace(':min', $parameters[0], $message);
        $message = str_replace(':max', $parameters[1], $message);

        return $message;
    }

    /**
     * パスワードの文字列チェック
     */
    public function validatePasswordString($attribute, $value, $parameters)
    {
        return preg_match('/^[!-~]+$/', $value); // 半角の英数字と記号のみか
    }
}
