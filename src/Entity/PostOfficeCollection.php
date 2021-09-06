<?php

namespace MerchantClient\Entity;

use Paysera\Component\RestClientCommon\Entity\Result;

class PostOfficeCollection extends Result
{
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * @return PostOffice[]
     */
    public function getList()
    {
        $items = $this->getByReference('list');
        if ($items === null) {
            return [];
        }

        $list = [];
        foreach($items as &$item) {
            $list[] = (new PostOffice())->setDataByReference($item);
        }

        return $list;
    }
    /**
     * @param PostOffice[] $list
     * @return $this
     */
    public function setList(array $list)
    {
        $data = [];
        foreach($list as $item) {
            $data[] = $item->getDataByReference();
        }
        $this->setByReference('list', $data);
        return $this;
    }
}
