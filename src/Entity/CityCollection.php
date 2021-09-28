<?php

namespace paysera\MerchantClient\Entity;

use Paysera\Component\RestClientCommon\Entity\Result;

class CityCollection extends Result
{
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * @return City[]
     */
    public function getItems()
    {
        $items = $this->getByReference('items');
        if ($items === null) {
            return [];
        }

        $list = [];
        foreach($items as &$item) {
            $list[] = (new City())->setDataByReference($item);
        }

        return $list;
    }
    /**
     * @param City[] $items
     * @return $this
     */
    public function setItems(array $items)
    {
        $data = [];
        foreach($items as $item) {
            $data[] = $item->getDataByReference();
        }
        $this->setByReference('items', $data);
        return $this;
    }
}
