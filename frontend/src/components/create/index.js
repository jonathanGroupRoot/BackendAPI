import React from 'react';
import {connect} from 'react-redux';
import API from '../services/API.js';
import './style.scss';

class Create extends React.Component{
    state = {
        data:{
            sexo:1,
            CPF:"",
            ativo:1,
            dataDeCadastro:(`2020-01-12 11:11:11`),
        },
        themeContent:{
            hipedBallDirection:'0%',
        }
    }



    // IMPORTANTE ===================================

    handleSubmit = async (event)=>{
        event.preventDefault();
        
        const dataForSubmit = 
        await {
            ...this.state.data,
            dataDeNascimento:(this.state.data.dataDeNascimento + " 11:11:11"),
        }
        API.post(`/api/CadastrarPessoas?nome=${dataForSubmit.nome}&CPF=${dataForSubmit.CPF}&dataDeNascimento=${dataForSubmit.dataDeNascimento}&dataDeCadastro=${dataForSubmit.dataDeCadastro}&RG=${dataForSubmit.RG}&endereco=${dataForSubmit.endereco}&telefone=${dataForSubmit.telefone}&sexo=${dataForSubmit.sexo}&nacionalidade=${dataForSubmit.nacionalidade}&ativo=${dataForSubmit.ativo}`,)
            .then((response)=>console.log(response.data))
            .catch(error => {console.log(error.message)});
    }



    //================================================

    handleChange = (event)=>{
        console.log(this.state.data);
        this.setState({
            data:{
                ...this.state.data,
                [event.target.name]: event.target.value
            }
        });
    }

    handleChangeRegex = (event)=>{
        let cpf = event.target.value
              .replace(/\D/g, '') // substitui qualquer caracter que nao seja numero por nada
              .replace(/(\d{3})(\d)/, '$1.$2') // captura 2 grupos de numero o primeiro de 3 e o segundo de 1, apos capturar o primeiro grupo ele adiciona um ponto antes do segundo grupo de numero
              .replace(/(\d{3})(\d)/, '$1.$2')
              .replace(/(\d{3})(\d{1,2})/, '$1-$2')
              .replace(/(-\d{2})\d+?$/, '$1'); // captura 2 numeros seguidos de um traço e não deixa ser digitado mais nada
        
        this.setState({data:{...this.state.data,CPF:cpf}});

    }
    hipedBallHandler = ()=>{
        if(this.state.themeContent.hipedBallDirection === '0%'){
            this.setState({data:{...this.state.data,sexo:0},themeContent:{hipedBallDirection:'50%'}})
        }else{
            this.setState({data:{...this.state.data,sexo:1},themeContent:{hipedBallDirection:'0%'}})
        }
    }

    render(){
        const themeChanged = this.props.theme;
        const hiped = {
            backgroundColor:themeChanged.goodcolor,
            width:'75px',
            height:'25px',
            borderRadius:'75px',
            position: 'relative',
            

        };
        const hipedBall = {
            position:'absolute',
            left:this.state.themeContent.hipedBallDirection,
            transition:'all 1s',
            width : (parseFloat(hiped.width) / 2) + 'px',
            backgroundColor : 'rgba(0,0,0,.6)',
            height: hiped.height,
            borderRadius : (parseFloat(hiped.width) / 2) + 'px',
        }
        return(
            <div className='read-main' style={({backgroundColor:themeChanged.bgcolor})}>
                <h3 style={({color:themeChanged.color})}>ADICIONE UMA PESSOA</h3>
                <form style={({backgroundColor:themeChanged.bggood,color:themeChanged.goodcolor})} className='create-form' onSubmit={this.handleSubmit} id='create-form'>
                {/**NOME */}
                <label>
                    Nome:
                    <br/>
                    <input type="text" style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} value={this.state.nome} onChange={this.handleChange} name='nome' className='styledInput' placeholder='Nome'/>
                </label>
                <br/>
                

                {/* ENDEREÇO */}
                <label>
                    Endereço
                    <br/>
                    <input type="text" style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} value={this.state.endereco} onChange={this.handleChange} name='endereco' className='styledInput' placeholder='Endreço'/>
                </label>
                <br/>
                {/* TELEFONE */}
                <label>
                    Telefone
                    <br/>
                    <input type="text" style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} value={this.state.telefone} onChange={this.handleChange} name='telefone' className='styledInput' placeholder='Telefone'/>
                </label>
                <br/>
                {/* Nacionalidade */}
                <label>
                    Nacionalidade
                    <br/>
                    <input type="text" style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} value={this.state.nacionalidade} onChange={this.handleChange} name='nacionalidade' className='styledInput' placeholder='Nacionalidade'/>
                </label>
                <br/>
                {/**CPF */}
                <label>
                    CPF: 
                    <br/>
                    <input type='text' style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} placeholder='CPF' id='CreateCPF' onChange={this.handleChangeRegex} value={this.state.data.CPF} maxLength='14' className='styledInput'/>
                </label>
                <br/>
                 {/* RG */}
                 <label>
                    RG
                    <br/>
                    <input type="number" style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} value={this.state.RG} onChange={this.handleChange} name='RG' className='styledInput' placeholder='RG'/>
                </label>
                <br/>
                {/**data de Nascimento */}
                <label>
                    Data de Nascimento:
                    <br/>
                    <input type="date" style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} value={this.state.dataDeNascimento} onChange={this.handleChange} name='dataDeNascimento' className='styledInput' />
                </label>
                <br/>
                
                {/* SEXO */}
                <label>Sexo</label>
                <br/>
                <div className='content-sexo'>
                    <div className='hiped' style={hiped} onClick={this.hipedBallHandler}>
                        <div className='hipedBall' style={hipedBall}></div>
                    </div>
                    <p>{((this.state.data.sexo === 1 || this.state.data.sexo === undefined)?"Masculino":"Feminino")}</p>
                </div>
                <button>ENVIAR</button>
                </form>
            </div>
                
        );
    }
}

export default connect(state=>({theme:state.theme}))(Create);