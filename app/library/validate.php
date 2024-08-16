<?php
declare(strict_types=1);

/**
 * 引数の文字列が空文字の場合はfalse、空文字ではない場合はtrue
 * 
 * @param string $str 被判定文字列
 * @return boolean true: OK, false: 未入力
 */
function isNotNull(string $str): bool {
    // if(!empty($title)){
    // }
    // return !empty($str);
    return $str != '';
}

/**
 * 数値判定
 * 
 * @param string $str 被判定文字列
 * @return boolean true: 数値, false: 数値ではない
 */
// function isNumeric(string $str): bool {
//     return is_numeric($str) && intval($str) == $str && $str > 0;//動くのこれ？
// }

function isNumeric(string $str): bool {
    if (preg_match('/\A[0-9]+\z/', $str)) {
        return true;
    }
    return false;
}

/**
 * 最大文字数判定
 * 
 * @param string $str 被判定文字列
 * @param integer $length 最大文字数
 * @return boolean true: 最大文字数未満, false: 最大文字数以上
 */
function isWithinLength(string $str, int $length): bool {
    return mb_strlen($str,'UTF-8') <= $length;
}
?>