<?php


namespace Algorithm\normal\m855;

/**
 * 考场就座
 * 在考场里，一排有 N 个座位，分别编号为 0, 1, 2, ..., N-1 。
 * 当学生进入考场后，他必须坐在能够使他与离他最近的人之间的距离达到最大化的座位上。如果有多个这样的座位，他会坐在编号最小的座位上。(另外，如果考场里没有人，那么学生就坐在 0 号座位上。)
 * 返回 ExamRoom(int N) 类，它有两个公开的函数：其中，函数 ExamRoom.seat() 会返回一个 int （整型数据），代表学生坐的位置；函数 ExamRoom.leave(int p) 代表坐在座位 p 上的学生现在离开了考场。每次调用 ExamRoom.leave(p) 时都保证有学生坐在座位 p 上。
 *
 * Class ExamRoom
 * @package Algorithm\normal\m855
 */
class ExamRoom
{
    private $data;

    private $capacity;

    private $size;

    /**
     * @param Integer $N
     */
    function __construct(int $N)
    {
        $this->data = [];
        $this->capacity = $N;
        $this->size = 0;
    }

    /**
     * @return Integer
     */
    function seat(): int
    {
        if ($this->size == 0) {
            $this->data[0] = true;
            $this->size++;
            return 0;
        }
        $distance = 0;
        $pre = null;
        $result = 0;
        foreach ($this->data as $key => $value) {
            if ($pre === null) {
                $distance = $key;
            } elseif (intdiv($key - $pre, 2) > $distance) {
                $distance = intdiv($key - $pre, 2);
                $result = $pre + $distance;
            }
            $pre = $key;
        }

        if ($this->capacity - 1 - $pre > $distance) {
            $result = $this->capacity - 1;
        }
        $this->size++;
        $this->data[$result] = true;
        ksort($this->data);
        return $result;
    }

    /**
     * @param Integer $p
     */
    function leave(int $p)
    {
        unset($this->data[$p]);
        $this->size--;
    }
}