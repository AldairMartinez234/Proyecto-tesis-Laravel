<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Logon_log;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
class AuthController extends Controller
{

    private $client;

    public function __construct(){
        $this->client = Client::find(1);
    }

    public function register(Request $request){


        $user = User::create([
            'id' => request('id'),
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        $params = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret, 
            'username' => request('email'),
            'password' => request('password'),      
            'scope' => '*'
        ];


        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);

    }

    public function login(Request $request){

        
 $request->validate([
        'email'       => 'required|string|email',
        'password'    => 'required|string',
        'remember_me' => 'boolean',
    ]);    $credentials = request(['email', 'password']);
    $credentials['active'] = 1;
    $credentials['deleted_at'] = null;
    
    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'No Autorizado'], 401);
    }    $user = $request->user();
    $tokenResult = $user->createToken('Token Acceso Personal');
    $token = $tokenResult->token;    if ($request->remember_me) {
        $token->expires_at = Carbon::now()->addWeeks(1);
    }    $token->save();    return response()->json([
        'access_token' => $tokenResult->accessToken,
        'token_type'   => 'Bearer',
        'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
    ]);

    }

    public function refresh(Request $request){

        $params = [
            'grant_type' => 'refresh_token',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret, 
            'username' => request('username'),
            'password' => request('password'),      
            'scope' => '*'
        ];


        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);

    }

    public function logout(Request $request){

        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);

        $accessToken->revoke();

        return response()->json([], 204);

    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
	
    public function log()
    {

     $login=DB::SELECT('SELECT login_ts FROM users where email = ?', [auth()->user()->email]);
    DB::update('UPDATE logon_log set logout_ts=NOW() where login_ts = ?', [$login[0]->login_ts]);
    DB::update('UPDATE users set login_ts=NOW(), estado= ? where email = ?', ['Inactivo',auth()->user()->email]);
        // Cerramos la sesión
        Auth::logout();
        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        return Redirect::to('login');
    }
 
}
