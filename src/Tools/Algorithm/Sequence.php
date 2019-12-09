<?php


namespace Tools\Algorithm;


class Sequence
{
    use Instance;

    private $str = '';

    /**
     * @param string $str
     */
    public function setStr(string $str)
    {
        $this->str = $str;
        return $this;
    }

    /**
     * 字符串编码
     * @return string
     */
    public function encode()
    {
        $len = strlen($this->str);
        $s   = '';

        if (empty($this->str) && $len > 128) return "字符串不合法";

        for ($i = 0; $i < $len; $i++) {
            # 返回首字符的ASCII值
            $c = ord($this->str[$i]);
            if ($c > 31 && $c < 107) $c += 20;
            if ($c > 106 && $c < 127) $c -= 75;
            $word = chr($c);
            $s    .= $word;
        }

        return $s;
    }

    /**
     * 字符串解码
     * @return string
     */
    public function decode()
    {
        $len = strlen($this->str);
        if (empty($this->str) && $len > 128) return "字符串不合法";
        $s = '';

        for ($i = 0; $i < $len; $i++) {

            $c = ord($this->str[$i]);
            if ($c > 106 && $c < 127) $c = $c + 75;
            if ($c > 31 && $c < 107) $c = $c - 20;
            $word = chr($c);
            $s    .= $word;
        }

        return $s;
    }

    /**
     * 加密
     * @param string $encryptKey
     * @param string $decryptKey
     * @return string
     */
    public function encrypt($encryptKey = '123456789123456789123456789123456789', $decryptKey = '987654321987654321987654321987654321')
    {
        $enstr = '';

        if (empty($this->str)) return '字符串为空';

        for ($i = 0; $i < strlen($this->str); $i++) {

            for ($j = 0; $j < strlen($encryptKey); $j++) {

                if ($this->str[$i] == $encryptKey [$j]) {

                    $enstr .= $decryptKey[$j];

                    break;
                }
            }
        }

        return $enstr;
    }

    /**
     * 解密
     * @param string $encryptKey
     * @param string $decryptKey
     * @return bool|string
     */
    public function decrypt($encryptKey = '123456789123456789123456789123456789', $decryptKey = '987654321987654321987654321987654321')
    {
        $enstr = '';

        if (empty($this->str)) return  false;

        for ($i=0;  $i<strlen($this->str); $i ++){

            for ($j=0; $j <strlen($decryptKey); $j ++){

                if ($this->str[$i] == $decryptKey [$j]){

                    $enstr .=  $encryptKey[$j];

                    break;
                }
            }
        }

        return $enstr;
    }
}