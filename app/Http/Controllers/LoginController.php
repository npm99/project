<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Factory;
use App\Models\Level;
use App\Models\News;
use App\Models\Users;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use EKAPHONG\XML_RPC;



class LoginController extends Controller
{

    public function formLogin()
    {

        return view('index.login');
    }

    public function login(Request $request)
    {

        $server = "https://service.eng.rmuti.ac.th/webservice2/xmlrpc/";
        $server1 = "https://service.eng.rmuti.ac.th/eng-login/xmlrpc/";
        // $res = XML_RPC::decrypt($server, 'tqfnmp', $request->attribs);
        $res = $request->attribs;
        $user = str_replace("'", '"', $res);
        $user = str_replace(['[', ']'], "", $user);
        $user = json_decode($user, FALSE);
        // return json_encode($user); 
        //        if ($user->title == 'Students') {
        //            return redirect('/logout');
        //            exit();phoemporn.la prasan.ue
        //        }
        $checkUser = Users::where('Username', 'like', $user->uid)->count();
        $fac = Factory::all();
        $level = Level::all();

        // print_r(str_replace("'", '"', $url['attribs']));
        if ($checkUser > 0) {

            // $name = users::all();
            $users = Users::where('Username', 'like', $user->uid)->first();
            session()->put('data', $users);
            //  printf($users);

            // $news = news::where('idnews', 1)->first();
            return redirect('/tqf');
            // if ($users->sublevel->levelID == '2') {
            //     return redirect('/teacher')->with([
            //         'name' => $name,
            //         'news' => $news,
            //         'users' => $users,
            //     ]);
            // }
            // return redirect('/officer')->with([
            //     'name' => $name,
            //     'news' => $news,
            //     'users' => $users,
            // ]);
        } else {
        }

        //    return view('index.content')->with(['data' => $url, 'user' => $user]);'data' => $url,
        // }

        return view('index.login')->with(['user' => $user, 'fac' => $fac, 'level' => $level]);
        //

    }
    public function logout()
    {
        $news = news::where('idnews', 1)->first();
        $url = request()->query();
        session()->flush();
        return redirect('/')->with(['news' => $news, 'url', $url]);
    }
}
