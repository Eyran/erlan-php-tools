<?php


namespace Tools\Algorithm;

/**
 * 获取目录树
 * Class SetTree
 * @package Tools\Algorithm
 */
class SetTree
{
    use Instance;

    private $data = NULL;

    public function setData($data = [])
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array|string
     */
    public function run()
    {
        $items = array ();

        if(empty($this->data)){

            return "data 属性为空";
        }

        # 设置id为数组前缀
        foreach ($this->data as $v) {

            $items[$v['id']] = $v;
        }

        $tree = array ();

        foreach ($items as $k => $item) {

            if (isset($items[$item['pid']])) {

                $items[$item['pid']]['sub'][] = &$items[$k];

            } else {

                $tree[] = &$items[$k];
            }

        }

        return $tree;
    }

}