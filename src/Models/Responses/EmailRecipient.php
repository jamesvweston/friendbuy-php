<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class EmailRecipient implements \JsonSerializable
{


    use SimpleSerialize;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string[]
     */
    protected $invitation_dates;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->email                    = AU::get($data['email']);
        $this->invitation_dates         = AU::get($data['invitation_dates'], []);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();

        return $object;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return \string[]
     */
    public function getInvitationDates()
    {
        return $this->invitation_dates;
    }

    /**
     * @param \string[] $invitation_dates
     */
    public function setInvitationDates($invitation_dates)
    {
        $this->invitation_dates = $invitation_dates;
    }
}