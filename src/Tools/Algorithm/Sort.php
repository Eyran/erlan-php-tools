<?php


namespace Tools\Algorithm;


class Sort
{
    use Instance;

    private $data;

    /**
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 冒泡排序
     * @return $this
     */
    public function bubbleSort()
    {
        $len = count($this->data);

        for($i = 0; $i < $len; $i++){

            for ($j = 0; $j < $len - 1 - $i; $j++){

                if ($this->data[$j] > $this->data[$j + 1]){

                    $t = $this->data[$j];

                    $this->data[$j] = $this->data[$j + 1];

                    $this->data[$j + 1] = $t;

                }
            }
        }

        return $this;
    }

    /**
     * 涟漪排序
     * @return $this
     */
    public function cocktailSort()
    {
        $left = 0;
        $right = count($this->data) - 1;

        while ($left < $right){

            for ($i = $left; $i < $right; $i++) {

                if ($this->data[$i] > $this->data[$i + 1]){

                    $t = $this->data[$i];

                    $this->data[$i] = $this->data[$i + 1];

                    $this->data[$i + 1] = $t;
                }
            }

            $right--;

            for ($i = $right; $i > $left; $i--){

                if($this->data[$i - 1] > $this->data[$i]){

                    $t = $this->data[$i -1];

                    $this->data[$i - 1] = $this->data[$i];

                    $this->data[$i] = $t;
                }
            }
            $left++;
        }

        return $this;
    }


    /**
     * 选择排序
     * @return $this
     */
    public function selectionSort()
    {
        $len = count($this->data);

        for ($i = 0; $i < $len; $i++){

            $min = $i;

            for ($j = $i + 1; $j < $len; $j++){

                if($this->data[$j] < $this->data[$min]){

                    $min = $j;

                }

            }

            if($min != $i){

                $t = $this->data[$min];

                $this->data[$min] = $this->data[$i];

                $this->data[$i] = $t;

            }

        }

        return $this;
    }

    /**
     * 二分法排序
     * @return $this
     */
    public function binarySearchSort()
    {
        for ($i = 1; $i < count($this->data); $i++){

            $get = $this->data[$i];
            $left = 0;
            $right = $i - 1;

            while ($left <= $right){

                $mid = floor(($left + $right) / 2);

                if($this->data[$mid] > $get){

                    $right = $mid - 1;

                }else{

                    $left = $mid + 1;
                }
            }

            for ($j = $i - 1; $j >= $left; $j--) {

                $this->data[$j + 1] = $this->data[$j];
            }

            $this->data[$left] = $get;
        }

        return $this;
    }
}