<?php

namespace jamesvweston\FriendBuy\Models;


trait SimpleSerialize
{

    /**
     * @return array
     */
    protected function simpleSerialize()
    {
        return get_object_vars($this);
    }
}