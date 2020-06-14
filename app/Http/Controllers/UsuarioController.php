<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;
use App\Usuario;

class UsuarioController extends Controller
{
    protected $jwt;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
        $this->middleware('auth:api',[
            'except' => ['usuarioLogin','cadastrarUsuario']
        ]);
    }
    public function usuarioLogin(Request $request)
    {
        $messages = [
            'usuario.required' => 'Usuário é um campo obrigatório',
            'usuario.min' => 'Usuário mínimo 5 caracteres',
            'usuario.max' => 'Usuário máximo 40 caracteres',

            'password.required' => 'Senha é um campo obrigatório',
            'password.min' => 'Senha mínimo 8 caracteres',
            'password.max' => 'Senha máximo 40 caracteres',
        ];
        $this->validate($request, [
            'usuario' => 'required|min:5|max:40',
            'password' => 'required|min:8:max:40',
        ],$messages);
        if(! $token = $this->jwt->claims(['usuario' => $request->usuario])->attempt($request->only('usuario','password')))
        {
            return response()->json(['Usuário não encontrado'],404);
        }
            return response()->json(compact('token'));
    }
    public function mostrarUsuarioAutenticado()
    {
        $usuario =  Auth::user();
        return response()->json($usuario);
    }
    public function usuarioLogout()
    {
        Auth::logout();
        return response()->json('Usuário Deslogado Com Sucesso!!');
    }
  

    public function mostrarTodosUsuarios(){
        return response()->json(Usuario::all());
    }


    public function cadastrarUsuario(Request $request){
        $messages = [
            'usuario.required' => 'Usuário é um campo obrigatório',
            'usuario.min' => 'Usuário mínimo 5 caracteres',
            'usuario.max' => 'Usuário máximo 40 caracteres',
            'usuario.unique' => 'Usuário já existe',
            'email.required' => 'Email é um campo obrigatório',
            'email.email' => 'Email não corresponde ao tipo email verifique e tente novamente',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'Senha é um campo obrigatório',
            'password.min' => 'Senha mínimo 8 caracteres',
            'password.max' => 'Senha máximo 40 caracteres',
        ];
        $this->validate($request,[
        'usuario' => 'required|min:5|max:40|unique:usuarios,usuario',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:8|max:40',
        ],$messages);
        $usuario = new Usuario;
        $usuario->email = $request->email;
        $usuario->usuario = $request->usuario;
        $usuario->password = Hash::make($request->password);
        $usuario->verificado = 0;
        $usuario->save();
        return response()->json($usuario); 
    }
    public function mostrarUmUsuario($id)
    {
        return response()->json(Usuario::find($id));
    }
    
    public function atualizarUsuario(Request $request,$id)
    {
        $usuario = Usuario::find($id);
        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->verificado = 0;
        $usuario->save();
        return response()->json($usuario);
    }
    public function deletar($id)
    {
        $usuario = Usuario::find($id);
        return response()->json($usuario->delete());
    }
}
