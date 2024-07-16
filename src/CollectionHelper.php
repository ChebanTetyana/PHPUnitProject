<?php

namespace Cheba\PhpUnit;

class CollectionHelper
{
    public function findLastElement(array $list)
    {
        if (empty($list)) {
            throw new \InvalidArgumentException('The list is empty.');
        }

        return end($list);
    }

    public function findPenultimateElement(array $list)
    {
        if (count($list) < 2) {
            throw new \InvalidArgumentException('The list is empty.');
        }

        return $list[count($list) - 2];
    }

    public function kthElement(array $list, int $k)
    {
        if ($k < 0 || $k >= count($list)) {
            throw new \OutOfBoundsException("The index is outside the bounds of the list");
        }

        return $list[$k];
    }

    public function numberOfElements(array $list)
    {
        if (count($list) < 1) {
            throw new \InvalidArgumentException('The list is empty.');
        }
        return count($list);
    }

    public function reverseList(array $list)
    {
        if (count($list) < 1) {
            throw new \InvalidArgumentException('The list is empty.');
        }

        return array_reverse($list);
    }

    public function isPolindrome(array $list): bool
    {
        if (count($list) < 3) {
            return false;
        }

        return $list === array_reverse($list);
    }

    public function flatten(array $list): array
    {
        $result = [];
        foreach ($list as $element) {
            if (is_array($element)) {
                $result = array_merge($result, $this->flatten($element));
            } else {
                $result[] = $element;
            }
        }
        return $result;
    }

    public function eliminateConsecutiveDuplicates(array $list): array
    {
        if (empty($list)) {
            return [];
        }

        $result = [];
        $previousElement = $list[0];
        $result[] = $previousElement;
        foreach ($list as $element) {
            if ($element !== $previousElement) {
                $result[] = $element;
                $previousElement = $element;
            }
        }
        return $result;
    }

    public function packConsecutiveDuplicates(array $list): array
    {
        if (empty($list)) {
            return [];
        }

        $packedList = [];
        $currentSublist = [$list[0]];

        for ($i = 1; $i < count($list); $i++) {
            if ($list[$i] === $list[$i - 1]) {
                $currentSublist[] = $list[$i];
            } else {
                $packedList[] = $currentSublist;
                $currentSublist = [$list[$i]];
            }
        }

        $packedList[] = $currentSublist;

        return $packedList;
    }

    public function runLengthEncoding(array $list): array
    {
        $packedList = $this->packConsecutiveDuplicates($list);
        $encodedList = [];

        foreach ($packedList as $sublist) {
            $encodedList[] = [count($sublist), $sublist[0]];
        }

        return $encodedList;
    }
}
