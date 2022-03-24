<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareModel extends Model
{
    public function ShareWidget($url)
    {
        $shareComponent = \Share::page($url)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();

        return $shareComponent;
    }
}
