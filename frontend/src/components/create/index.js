import React from 'react';
import {connect} from 'react-redux';
// import API from '../services/API.js';
import './style.scss';

class Create extends React.Component{
    state = {}
    handleChange = (event)=>{
        this.setState({[event.target.name]: event.target.value});
        console.log(this.state);
    }

    render(){
        const themeChanged = this.props.theme;
        return(
            <div className='read-main' style={({backgroundColor:themeChanged.bgcolor})}>
                <h3 style={({color:themeChanged.color})}>ADICIONE UMA PESSOA</h3>
                {/*
                    idPessoa INT
                    name VARCHAR(255)
                    cpf INT
                    dataDeNascimento DATE
                    dataDeCadastro DATE
                    rg INT
                    endereco VARCHAR(255)
                    telefone INT
                    sexo BINARY(1)
                    nacionalidade VARCHAR(255)
                    ativo BINARY(1)
                */}
                <form style={({backgroundColor:themeChanged.bggood,color:themeChanged.goodcolor})}>
                <label>
                    Nome:
                    <input type="text" value={this.state.name} onChange={this.handleChange} name='name'/>
                </label>
                
                </form>
            </div>
                
                );
    }
}

export default connect(state=>({theme:state.theme}))(Create);