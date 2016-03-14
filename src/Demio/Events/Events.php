<?php

/**
 * @author Oleksandr Torosh <webtorua@gmail.com>
 */
namespace Demio\Events;

use Demio\Injectable;

/**
 * Class Events
 * @package Demio\Events
 */
class Events extends Injectable
{

    /**
     * @return \Demio\Http\Response
     */
    public function getList()
    {
        return $this->getRequest()->get('events');
    }

    /**
     * @param $id
     * @return \Demio\Http\Response
     */
    public function getEvent($id)
    {
        return $this->getRequest()->get('event/' . $id);
    }

    public function getEventDate($id, $date_id)
    {
        return $this->getRequest()->get('event/' . $id . '/date/' . $date_id);
    }

}