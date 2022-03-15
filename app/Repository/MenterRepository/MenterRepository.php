<?php

namespace App\Repository\MenterRepository;

use App\Repository\MenterRepository\MenterRepositoryInterface;
use App\Models\Menter;

class MenterRepository implements MenterRepositoryInterface{
    
    public function getMenter($userId){
        
        return Menter::where('user_id', $userId)->first();

    }

    public function createUpdateMenter($userId, $request, $menter){
        
        if(!isset($menter)){
            Menter::create([
                'user_id' => $userId,
                'm_name' => $request->m_name ?? 'メンターを設定してください。',
                'm_email' => $request->m_email ?? 'メンターのメールアドレスを設定してください。',
            ]);
        } else {
            $menter->m_name = $request->m_name ?? $menter->m_name;
            $menter->m_email = $request->m_email ?? $menter->m_email;
            $menter->save();
        }
    }

}