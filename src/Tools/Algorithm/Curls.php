<?php


namespace Tools\Algorithm;


class Curls
{
    use Instance;
    private static $curl = NULL;


    # 开始执行
    public function run($url, $data = NULL, $head = NULL)
    {
        $this->init();
        # 设置请求地址
        $this->netUrl($url);
        # 判断是否传入参数
        if (!is_null($data)) {
            $this->netPost($data);
        }
        if (!is_null($head)) {
            $this->netHead($head);
        }
        # 设置请求参数
        $this->netSetopt();
        # 发送请求
        $rep = curl_exec(self::$curl);
        # 获取错误值
        $error = $this->netError();
        #　关闭资源
        $this->netClose();
        if ($error === TRUE) {
            return $rep;
        }
        return $error;
    }


    private function init()
    {
        self::$curl = curl_init();
    }

    # 设置头部
    private function netHead($head)
    {
        curl_setopt(self::$curl, CURLOPT_HTTPHEADER, $head);
    }

    # get 请求
    private function netUrl($url)
    {
        curl_setopt(self::$curl, CURLOPT_URL, $url);
    }

    # post 请求
    private function netPost($data)
    {
        curl_setopt(self::$curl, CURLOPT_POST, TRUE);
        curl_setopt(self::$curl, CURLOPT_POSTFIELDS, $data);
    }

    # 设置参数
    private function netSetopt()
    {
        curl_setopt(self::$curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt(self::$curl, CURLOPT_HEADER, FALSE);
    }

    # 报错信息
    private function netError()
    {
        $code = curl_errno(self::$curl);
        if ($code != 0) {
            $msg = curl_error(self::$curl);
            return "err: {$code}-{$msg}";
        }
        return TRUE;
    }

    # 关闭
    private function netClose()
    {
        curl_close(self::$curl);
    }

}