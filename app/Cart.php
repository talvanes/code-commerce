<?php

namespace PortalComercial;

class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    # add
    public function add($id, $name, $price) {
        $this->items += [
            $id => [
                'num' => ( isset($this->items[$id]['num'])? $this->items[$id]['num']++ : 1 ),
                'name' => $name,
                'price' => $price,
            ]
        ];

        return $this->items;
    }

    # remove
    public function remove($id) {
        unset($this->items[$id]);
    }

    # all
    public function all() {
        return $this->items;
    }

    # getTotal
    public function getTotal() {
        $total = 0;
        foreach($this->items as $item):
            $total += $item['price'] * $item['num'];
        endforeach;
        return $total;
    }

}