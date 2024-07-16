<?php

namespace Cheba\PhpUnit\Tests;

use Cheba\PhpUnit\CollectionHelper;
use http\Exception\InvalidArgumentException;
use OutOfBoundsException;
use PHPUnit\Framework\TestCase;

class CollectionHelperTest extends TestCase
{
   /**
    * @dataProvider listProvider
    */

    public function testFindLastElement(array $list, $expected)
    {
        $collectionHelper = new CollectionHelper();

        $result = $collectionHelper->findLastElement($list);
        $this->assertEquals($expected, $result);
    }

    public function listProvider()
    {
        return [
            [[3, 2, 6, 7], 7],
            [[8], 8],
            [[true, false, true], true],
            [['a', 'r', 'u'], 'u']
        ];
    }

    public function testFindLastElementEmptyList()
    {
        $this->expectException(\InvalidArgumentException::class);
        $collectionHelper = new CollectionHelper();
        $list = [];
        $collectionHelper->findLastElement($list);
    }

    /**
     * @dataProvider penultimateProvider
     */

    public function testFindPenultimateElement(array $list, $expected)
    {
        $collectionHelper = new CollectionHelper();
        $result = $collectionHelper->findPenultimateElement($list);
        $this->assertEquals($expected, $result);
    }

    public function penultimateProvider()
    {
        return [
            [[3, 2, 6, 7], 6],
            [[true, false, true], false],
            [['a', 'r', 'u'], 'r']
        ];
    }

    public function testLimitCountFindPenultimateElement()
    {
        $this->expectException(\InvalidArgumentException::class);
        $collectionHelper = new CollectionHelper();
        $list = [2];
        $collectionHelper->findPenultimateElement($list);
    }

    /**
     * @dataProvider kthElementProvider
     */

    public function testKthElement(array $list, $k, $expected)
    {
        $collectionHelper = new CollectionHelper();
        $result = $collectionHelper->kthElement($list, $k);
        $this->assertEquals($expected, $result);
    }

    public function kthElementProvider()
    {
        return [
            [[3, 2, 6, 7], 2, 6],
            [['a', 'b', 'c', 'd'], 0, 'a']
        ];
    }

    public function testLimitCountKthElement()
    {
        $this->expectException(\OutOfBoundsException::class);
        $collectionHelper = new CollectionHelper();
        $list = [8];
        $collectionHelper->kthElement($list, 2);
    }

    /**
     * @dataProvider numberOfElementsProvider
     */

    public function testNumberOfElements($list, $expected)
    {
        $collectionHelper = new CollectionHelper();
        $result = $collectionHelper->numberOfElements($list);
        $this->assertEquals($expected, $result);
    }

    public function numberOfElementsProvider()
    {
        return [
            [[2, 9, 3], 3],
            [['a', 'b', 'c'], 3]
        ];
    }

    public function testLimitCountNumberOfElements()
    {
        $this->expectException(\InvalidArgumentException::class);
        $collectionHelper = new CollectionHelper();
        $list = [];
        $collectionHelper->numberOfElements($list);
    }

    /**
     * @dataProvider reverseListProvider
     */

    public function testReverseList($list, $expected)
    {
        $collectionHelper = new CollectionHelper();
        $result = $collectionHelper->reverseList($list);
        $this->assertEquals($expected, $result);
    }

    public function reverseListProvider()
    {
        return [
            [[1, 5, 6, 9], [9, 6, 5, 1]],
            [['a', 'b', 'c', 'd'], ['d', 'c', 'b', 'a']],
        ];
    }

    public function testEmptyReverseList()
    {
        $this->expectException(\InvalidArgumentException::class);
        $collectionHelper = new CollectionHelper();
        $list = [];
        $collectionHelper->reverseList($list);
    }

    /**
     * @dataProvider isPolindromeProvider
     */

    public function testIsPolindrome($list, $expected)
    {
        $collectionHelper = new CollectionHelper();
        $result = $collectionHelper->isPolindrome($list);
        $this->assertEquals($expected, $result);
    }

    public function isPolindromeProvider()
    {
        return [
            [[1, 4, 6, 4, 1], true],
            [['a', 'b', 'c', 'b', 'a'], true],
            [[1, 4, 6, 2, 1], false],
            [[], false],
            [[1, 4], false],
            [[1], false],
        ];
    }

    /**
     * @dataProvider flattenProvider
     */
    public function testFlatten($list, $expected)
    {
        $collectionHelper = new CollectionHelper();
        $result = $collectionHelper->flatten($list);
        $this->assertEquals($expected, $result);
    }

    public function flattenProvider()
    {
        return [
            [[[6, 8, 2], 5, [2, 3]], [6, 8, 2, 5, 2, 3]],
            [[['a', 'b', 'c'], 'd', ['e']], ['a', 'b', 'c', 'd', 'e']],
            [[], []]
        ];
    }

    /**
     * @dataProvider duplicatesProvider
     */

    public function testEliminateConsecutiveDuplicates($list, $expected)
    {
        $collectionHelper = new CollectionHelper();
        $result = $collectionHelper->eliminateConsecutiveDuplicates($list);
        $this->assertEquals($expected, $result);
    }

    public function duplicatesProvider()
    {
        return [
            [[1, 4, 1, 1, 2], [1, 4, 1, 2]],
            [['a', 'g', 'b', 'b'], ['a', 'g', 'b']],
            [[], []]
        ];
    }

    /**
     * @dataProvider packConsecutiveDuplicatesProvider
     */
    public function testPackConsecutiveDuplicates(array $list, array $expected)
    {
        $collectionHelper = new CollectionHelper();
        $result = $collectionHelper->packConsecutiveDuplicates($list);
        $this->assertEquals($expected, $result);
    }

    public function packConsecutiveDuplicatesProvider()
    {
        return [
            [['a', 'a', 'a', 'a', 'b', 'c', 'c', 'a', 'a', 'd', 'e', 'e', 'e', 'e'], [['a', 'a', 'a', 'a'], ['b'], ['c', 'c'], ['a', 'a'], ['d'], ['e', 'e', 'e', 'e']]],
            [['a', 'b', 'b', 'c', 'c', 'c'], [['a'], ['b', 'b'], ['c', 'c', 'c']]],
            [['a'], [['a']]],
            [[], []]
        ];
    }

    /**
     * @dataProvider runLengthEncodingProvider
     */
    public function testRunLengthEncoding(array $list, array $expected)
    {
        $collectionHelper = new CollectionHelper();
        $result = $collectionHelper->runLengthEncoding($list);
        $this->assertEquals($expected, $result);
    }

    public function runLengthEncodingProvider()
    {
        return [
            [['a', 'a', 'a', 'a', 'b', 'c', 'c', 'a', 'a', 'd', 'e', 'e', 'e', 'e'], [[4, 'a'], [1, 'b'], [2, 'c'], [2, 'a'], [1, 'd'], [4, 'e']]],
            [['a', 'b', 'b', 'c', 'c', 'c'], [[1, 'a'], [2, 'b'], [3, 'c']]],
            [['a'], [[1, 'a']]],
            [[], []]
        ];
    }
}
