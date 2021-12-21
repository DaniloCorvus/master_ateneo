<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use App\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Login usuario y retornar el token
     * @return token
     */
    public function __construct()
    {
    }

    public function login(Request $request)
    {

        //Aqui se agregan las cedulas

        $array = [
            1234341258, 1028015289, 52182811, 1110582519,
            1110555865, 40340378, 1007382393, 1121968295,
            1093739451, 1090404518, 1075297904, 1080187733,
            1117266975, 1075257189, 1049648766, 1052739726,
            1052384357, 1093779992, 1090460113, 1090414307, 1090433542,
            1005024393, 1005024393, 1019150795, 1023028437, 27605195, 88194696,
            1014290454, 1090496232, 1019139304, 1019099884, 1233910910, 1071171094,
            1018511462, 1093779992, 1031126143, 1058973123, 1094244709 ,
            1096483418,
            1005030458,
            1005059843,
            1007959828,

            27634019,
            17625784,
            1090531454,
            1090371961,
            27601252,
            37274837,
            1094244709, 1078366288, 1015483747, 1015472174, 1000130469, 1014290797,
            1090414307, 1090433542, 1026297420, 1090488856, 1010124197, 1116505096,
            1093785462, 1090442050, 1094166729, 1005039383, 1004372443, 1090451687,
            52201207, 79309659, 1110528481, 1012466369,1090489108

        ];

        $credentials = $request->only('user', 'password');
        $data['usuario'] = $credentials['user'];
        $data['password'] = $credentials['password'];


        if (!in_array($data['usuario'], $array)) {
            return response()->json(['error' => 'Unauthoriz55ed'], 401);
        }


        if (!$token = JWTAuth::attempt([
            'usuario' => $data['usuario'],
            'password' => $data['password']
        ])) {
            return response()->json(['error' => 'Unauthoriz55ed'], 401);
        }

        return response()->json(['status' => 'success', 'token' => $this->respondWithToken($token)], 200)->header('Authorization', $token)
            ->withCookie(
                'token',
                $token,
                config('jwt.ttl'),
                '/'
            );
    }

    public function register()
    {
        $validador = Validator::make(request()->all(), [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validador->fails()) {
            return response()->json($validador->errors()->toJson(), 400);
        }

        $usuario = Usuario::create([
            'nombres' => request('nombres'),
            'apellidos' => request('apellidos'),
            'identificacion' => request('identificacion'),
            'usuario' => request('identificacion'),
            'password' => bcrypt(request('password')),
        ]);

        $usuario->save();

        $token = $this->guard()->login($usuario);

        return response()->json(['message' => 'User created successfully', 'token' => $token], 201);
    }

    /**
     * Logout usuario
     *
     * @return void
     */

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Logged out Successfully.'
        ], 200);
    }

    /**
     * Obtener el usuario autenticado
     *
     * @return Usuario
     */


    /**
     * Refrescar el token por uno nuevo
     *
     * @return token
     */

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()->json()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    public function renew()
    {
        try {
            //code...
            if (!$token = $this->guard()->refresh()) {
                return response()->json(['error' => 'refresh_token_error'], 401);
            }

            $user = auth()->user();

            $user = Usuario::with(
                [
                    'person' => function ($q) {
                        $q->select('*');
                    },
                    'permissions' => function ($q) {
                        $q->select('*');
                    }
                ]
            )->find($user->id);

            return response()
                ->json(['status' => 'successs', 'token' => $token, 'user' => $user], 200)
                ->header('Authorization', $token);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => 'refresh_token_error' . $th->getMessage()], 401);
        }
    }

    /**
     * Retornar el guard
     *
     * @return Guard
     */
    private function guard()
    {
        return Auth::guard();
    }


    protected function respondWithToken($token)
    {
        auth()->factory()->getTTL() * 60;

        return $token;
        // return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'bearer',
        //     'expires_in' => auth()->factory()->getTTL() * 60
        // ]);
    }
    public function changePassword()
    {

        //  try {
        //code...
        // $user = Usuario::find(auth()->user()->id);
        if (!auth()->user()) {
            return response()->json(['error' => 'refresh_token_error'], 401);
        }

        $user = Usuario::find(auth()->user()->id);
        $user->password = Hash::make(Request()->get('newPassword'));
        $user->change_password = 0;
        $user->save();
        return Response()->json(['status' => 'successs', 200]);
        // } catch (\Throwable $th) {
        //     return Response()->json(['status' => 'successs', 400]);
        //throw $th;
        // }
    }
}
