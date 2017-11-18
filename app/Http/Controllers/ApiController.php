<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 11/17/2017
 * Time: 4:57 PM
 */

namespace App\Http\Controllers;


use App\Cl0ne;
use App\Group;
use App\Profile;
use App\Spam;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ApiController extends Controller
{
    function __construct()
    {

    }


    function joinGroup(){
        $oldestSpam = Spam::orderBy('updated_at', 'ASC')->first();

        //$user = User::findOrFail($oldestSpam->uid);

        $profileId = $oldestSpam->profile_id;

        $profile = Profile::findOrFail($profileId);

        $oldestGroupOfSpam = Group::where('profile_id', $profileId)->orderBy('updated_at', 'ASC')->first();

        $oldestClone = Cl0ne::orderBy('updated_at', 'ASC')->first();


        $res = [
           // 'email' => $user->email,
            'profile_name' => $profile->name,
            'uid' => $oldestClone->uid,
            'token' => $oldestClone->token,
            'groupid' => $oldestGroupOfSpam->groupid,
            'action' => 'joingroup'
        ];

        $oldestSpam->updated_at = date('Y-m-d H:i:s');
        $oldestSpam->save();

        $oldestGroupOfSpam->updated_at = date('Y-m-d H:i:s');
        $oldestGroupOfSpam->save();

        $oldestClone->updated_at = date('Y-m-d H:i:s');
        $oldestClone->save();

        return response()->json($res, 200);


    }

    function cloneUpdate(){
        $uid = Input::get('uid');
        $status = Input::get('status');

        $cl0ne = Cl0ne::where('uid', $uid)->first();

        $cl0ne->status = $status;

        $cl0ne->save();

        return response()->json($cl0ne, 200);
    }
}