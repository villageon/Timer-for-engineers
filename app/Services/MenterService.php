<?php

namespace App\Services;

use App\Models\Menter;

class MenterService
{
    public function updateMenter($id){

        $menter = Menter::where('user_id', $id)->first();
        if (is_null($menter)) {
            $menter = new Menter();
            $menter->user_id = $id;
            $menter->m_name = '';
            $menter->m_email = '';
        }

        return $menter;
    }
}