<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return Collection|static[]
     */
    public function index(): object
    {
        return $this->user->all();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function register(Request $request): array
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $data = $request->all();

        $user = new $this->user;
        $user->fill($data);
        $user->password = app('hash')->make($data['password']);

        if (!$user->save())
            return ['created' => false];

        return ['created' => true, 'user' => $user];
    }

    /**
     * @param Request $request
     * @return array|Response
     */
    public function refreshToken(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = $request->all();

        $user = $this->user->where('email', $data['email'])->first();
        if (app('hash')->check($data['password'], $user->password)) {
            $token = StringHelper::getRandom();
            $user->api_token = $token;
            $user->save();
            return ['token' => $token];
        }

        return response('Forbidden.', 403);
    }
}
