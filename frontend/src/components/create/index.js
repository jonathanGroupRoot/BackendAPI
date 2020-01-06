import React from 'react';
import {connect} from 'react-redux';
// import API from '../services/API.js';
import './style.scss';

class Create extends React.Component{
    state = {
        data:{
            sexo:1,
        },
        themeContent:{
            hipedBallDirection:'0%',
        }
    }
    handleChange = (event)=>{
        this.setState({
            data:{
                ...this.state.data,
                [event.target.name]: event.target.value
            }
        });
    }

    handleChangeRegex = (event)=>{
        let regex = /^[0-9.-]+$/;
        if(regex.test(event.target.value)) {   
            this.setState({data:{
                ...this.state.data,
                cpf: event.target.value
            }});
            if(event.target.value.length === 4 || event.target.value.length === 8){
                let dot = this.state.data.cpf + ".";
                this.setState({data:{cpf: dot}});
            }
            
            if(event.target.value.length === 12){
                let line = this.state.data.cpf + "-";
                this.setState({data:{cpf: line}});
            }
        }else{
            if(event.target.value.length <= 1){
                this.setState({data:{cpf: ""}});
            }
        }  
    }
    clear = (event)=>{
        event.preventDefault();
        this.setState({data:{cpf: ""}});
    }
    handleSubmit = (event)=>{
        event.preventDefault();
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
                    <input type="text" style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} value={this.state.name} onChange={this.handleChange} name='name' className='styledInput' placeholder='Nome'/>
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
                    <input type='text' style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} placeholder='CPF' id='CreateCPF' onChange={this.handleChangeRegex} value={this.state.data.cpf} maxLength='14' className='styledInput'/>
                </label>
                <button onClick={this.clear} className="Create-Btn">Reset</button>
                <br/>
                 {/* RG */}
                 <label>
                    RG
                    <br/>
                    <input type="number" style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} value={this.state.rg} onChange={this.handleChange} name='rg' className='styledInput' placeholder='RG'/>
                </label>
                <br/>
                {/**data de Nascimento */}
                <label>
                    Data de Nascimento:
                    <br/>
                    <input type="date" style={({color:themeChanged.goodcolor,backgroundColor:'transparent',border:'none',borderBottom:'1px solid '+themeChanged.goodcolor})} value={this.state.datadenascimento} onChange={this.handleChange} name='datadenascimento' className='styledInput' />
                </label>
                <br/>
                
                {/* SEXO */}
                <label>Sexo</label>
                <br/>
                <div className='content-sexo'>
                    <div className='hiped' style={hiped} onClick={this.hipedBallHandler}>
                        <div className='hipedBall' style={hipedBall}></div>
                    </div>
                    <p>{((this.state.data.sexo)?"Masculino":"Feminino")}</p>
                </div>
                <button>ENVIAR</button>
                </form>
            </div>
                
        );
    }
}

export default connect(state=>({theme:state.theme}))(Create);