<?php

// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use Illuminate\Validation\ValidationException;
// use App\Pessoa;

// class PessoaController extends Controller
// {
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function list()
//     {
//         return response()->json(Pessoa::all());
//     }
//     public function cadastrarPessoa(Request $request)
//     {
        // $messages = [
        //     'nome.required' => 'O nome é obrigatório',
        //     'nome.min' => 'Minímo 5 caracteres',
        //     'nome.max' => 'Máximo 255 caracteres',
        //     'CPF.required' => 'O CPF é obrigatório',
        //     'CPF.min' => 'CPF mínimo 14 caracteres incluindo traços',
        //     'CPF.max' => 'CPF máximo 14 caracteres incluindo traços',
        //     'CPF.unique' => 'O CPF digitado já está cadastrado',
        //     'CEP.required' => 'CEP é um campo obrigatório',
        //     'CEP.min' => 'CEP mínimo 9 caracteres incluindo traços',
        //     'CEP.max' => 'CEP máximo 9 caracteres incluindo traços',
        //     'dataDeNascimento.required' => 'Esse campo é obrigatório',
        //     'dataDeNascimento.date' => 'O campo Data de nascimento equivale somente a uma data',
        //     'RG.required' => 'RG é obrigatório',
        //     'RG.min' => 'RG mínimo 7 caracteres incluindo traços',
        //     'RG.max' => 'RG máximo 7 caracteres incluindo traços',
        //     'RG.unique' => 'O RG digitado já está cadastrado no sistema',
        //     'endereco.required' => 'Endereço e obrigatório',
        //     'endereco.min' => 'Endereço mínimo 5 caracteres',
        //     'endereco.max' => 'Endereco máximo 5 caracteres',
        //     'telefone.required' => 'Telefone é um campo obrigatório',
        //     'telefone.min' => 'Telefone mínimo 16 caracteres incluindo traços',
        //     'telefone.max' => 'Telefone máximo 16 caracteres incluindo traços',
        //     'sexo.required' => 'Este campo é obrigatório',
        //     'nacionalidade.required' => 'Este campo é obrigatório',
        //     'ativo.required' => 'Ativo é um campo obrigatório',
        // ];
        // $this->validate($request,[
        //     'nome' => 'required|min:5|max:255',
        //     'CPF' => 'required|min:14|max:14|bail|unique:pessoas,CPF',
        //     'CPF.*.first_name' => 'required_with:CPF.*.last_name',
        //     'CEP' => 'required|min:9|max:9',
        //     'dataDeNascimento' => 'required|date',
        //     'RG' => 'required|min:7|max:7|bail|unique:pessoas,RG',
    //         'RG.*.first_name' => 'required_with:RG.*.last_name',
    //         'endereco' => 'required|min:5|max:255',
    //         'telefone' => 'required|min:16|max:16',
    //         'sexo' => 'required|boolean',
    //         'nacionalidade' => 'required',
    //         'ativo' => 'required|boolean',
    //     ],$messages);
    //     $registros = new Pessoa;
    //     $registros->nome = $request->nome;
    //     $registros->CPF = $request->CPF;
    //     $registros->CEP = $request->CEP;
    //     $registros->dataDeNascimento = $request->dataDeNascimento;
    //     $registros->RG = $request->RG;
    //     $registros->endereco = $request->endereco;
    //     $registros->telefone = $request->telefone;
    //     $registros->sexo = $request->sexo;
    //     $registros->nacionalidade = $request->nacionalidade;
    //     $registros->ativo = $request->ativo;
    //     $registros->save();
    //     return response()->json('Cadastrado Com Sucesso!!');
    // }
    // public function delete($id)
    // {
    //     $pessoa = Pessoa::find($id);
    //     $del = $pessoa->delete();
    //     return response()->json('Deletado Com Sucesso!!');
    // }
    // public function editar($id)
    // {
    //     $registros = Pessoa::all();
    //     return response()->json($registros);
    // }
    // public function atualizar(Request $request,$id){
        // $messages = [
        //     'nome.required' => 'O nome é obrigatório',
        //     'nome.min' => 'Minímo 5 caracteres',
        //     'nome.max' => 'Máximo 255 caracteres',
        //     'CEP.required' => 'CEP é um campo obrigatório',
        //     'CEP.min' => 'CEP mínimo 9 caracteres incluindo traços',
        //     'CEP.max' => 'CEP máximo 9 caracteres incluindo traços',
        //     'dataDeNascimento.required' => 'Esse campo é obrigatório',
        //     'dataDeNascimento.date' => 'O campo Data de nascimento equivale somente a uma data',
        //     'endereco.required' => 'Endereço e obrigatório',
        //     'endereco.min' => 'Endereço mínimo 5 caracteres',
        //     'endereco.max' => 'Endereco máximo 5 caracteres',
        //     'telefone.required' => 'Telefone é um campo obrigatório',
        //     'telefone.min' => 'Telefone mínimo 16 caracteres incluindo traços',
        //     'telefone.max' => 'Telefone máximo 16 caracteres incluindo traços',
        //     'sexo.required' => 'Este campo é obrigatório',
        //     'nacionalidade.required' => 'Este campo é obrigatório',
        //     'cargo.required' => 'Cargo é um campo obrigatório',
        //     'cargo.min' => 'Cargo mínimo 5 caracteres',
        //     'cargo.max' => 'Cargo máximo 5 caracteres',
        //     'conta.required' => 'Conta é um campo obrigatório',
        //     'conta.min' => 'Conta mínimo 10 caracteres incluindo traços',
        //     'conta.max' => 'Conta máximo 10 caracteres incluindo traços',
        //     'tipoDaConta.required' => 'Tipo Da Conta é um campo obrigatório',
        //     'tipoDaConta.min' => 'Tipo Da Conta mínimo 5 caracteres',
        //     'tipoDaConta.max' => 'Tipo Da Conta máximo 20 caracteres',
        //     'agencia.required' => 'Agência é um campo obrigatório',
        //     'agencia.min' => 'Agência Mínimo 4 caracteres',
        //     'agencia.max' => 'Agência Máximo 4 caracteres',
        //     'salario.required' => 'Salário é um campo obrigatório',
        //     'salario.integer' => 'Este Campo Deve ser do Tipo númerico',
        //     'dataDeAdmissao.required' => 'Data De Admissao é um campo Obrigatório',
        //     'dataDeAdmissao.date' => 'Esse campo equivale somente a uma data verifique e digite novamente', 
        //     'CRO.required' => 'CRO é um campo Obrigatório',
        //     'CRO.min' => 'CRO Mínimo 5 Caracteres',
        //     'CRO.max' => 'CRO máximo 5 Caracteres',
        //     'especialidades.min' => 'Especialidades Mínimo 5 caracteres',
        //     'especialidades.max' => 'Especialidades Máximo 255 caracteres',
        //     'responsavelTecnico.required' => 'Responsável Tecnico é um campo obrigatório',
        //     'especialidades.min' => 'Especialidades Mínimo 5 Caracteres',
        //     'especialidades.max' => 'Especialidades Máximo 5 Caracteres',
        //     'especialidades.required' => 'Especialidades é um Campo Obrigatório',
      
        //  ];

//            $this->validate($request, [
//             'nome' => 'required|min:5|max:255',
//             'CEP' => 'required|min:9|max:9',
//             'dataDeNascimento' => 'required|date',
//             'endereco' => 'required|min:5|max:255',
//             'telefone' => 'required|min:16|max:16',
//             'sexo' => 'required|boolean',
//             'nacionalidade' => 'required',
               
//         ],$messages);
//         $registros = $request->all();
//         Pessoa::find($id)->update($registros);
//         return response()->json('Atualizado Com Sucesso!!');
//     }
    
// }
