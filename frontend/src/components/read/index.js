import React from 'react';
import SimpleBar from 'simplebar-react';
import 'simplebar/dist/simplebar.min.css';
import {connect} from 'react-redux';
import {Link} from 'react-router-dom';
import API from '../services/API.js';
import './style.scss';

class Read extends React.Component{
    state = {
        PopopDelete:'unwork',
        mainData:[],
        idDelete:0,
    }

    async componentDidMount(){
        await API.get('/api/listPessoas').then(response=>{
            this.setState({mainData:response.data});
            
        });
    }
    popopController = (id)=>{
        this.setState({PopopDelete:"delete",idDelete:id});
    }

    deleteApi = async()=>{
        await API.delete('/api/delete/'+this.state.idDelete);
        this.componentDidMount();
        this.setState({PopopDelete:"unwork"});
    }

    render(){
        const themeChanged = this.props.theme;
        return(
            <div className='read-main' style={({backgroundColor:themeChanged.bgcolor})}>
                <div className={this.state.PopopDelete} style={({color:themeChanged.color})}>
                    <div>
                        <h3>TEM CERTEZA?</h3>
                        <p>Esse dado será apagado <b>PARA SEMPRE</b></p>
                        <p>Caso prefira, apenas o oculte.</p>
                    </div>
                    <div>
                        <button className='first-btn-delete' onClick={()=>this.deleteApi()}>APAGAR</button>
                        <button className='second-btn-delete'>OCULTAR</button>
                    </div>
                </div>
                <h3 style={({color:themeChanged.color})}>LISTA DE PESSOAS</h3>
                <SimpleBar style={{ maxWidth: "100%",paddingBottom:'15px'}} className='read-table'>
                    <table>
                        <thead>
                            <tr style={({backgroundColor:themeChanged.bggood})}>
                                <th style={({color:themeChanged.goodcolor})}>AÇÃO</th>
                                <th style={({color:themeChanged.goodcolor})}>NOME</th>
                                <th style={({color:themeChanged.goodcolor})}>CPF</th>
                                <th style={({color:themeChanged.goodcolor})}>RG</th>
                                <th style={({color:themeChanged.goodcolor})}>ENDEREÇO</th>
                                <th style={({color:themeChanged.goodcolor})}>SEXO</th>
                                <th style={({color:themeChanged.goodcolor})}>NACIONALIDADE</th>
                                <th style={({color:themeChanged.goodcolor})}>DATA DE NASCIMENTO</th>
                                <th style={({color:themeChanged.goodcolor})}>DATA DE CADASTRO</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                                {this.state.mainData.map((item)=>{
                                    return(
                                        <tr key={item.id}>
                                            <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color,textDecoration:'none',whiteSpace:'nowrap',})}>
                                            <b style={({color:"#d63031",textDecoration:'none'})} onClick={()=>this.popopController(item.id)} className='link'>DELETAR </b> 
                                            | 
                                            <b><Link to={'/update/'+item.id} style={({color:'#0984e3',textDecoration:'none'})}> ALTERAR</Link></b>
                                            </td>
                                            <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>{item.nome}</td>
                                            <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>{item.CPF}</td>
                                            <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>{item.RG}</td>
                                            <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>{item.endereco}</td>
                                            <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>{((item.sexo)?'Masculino':'Feminino')}</td>
                                            <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>{item.nacionalidade}</td>
                                            <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>{item.dataDeNascimento}</td>
                                            <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>{item.dataDeCadastro}</td>
                                        </tr>
                                    );
                                })}

                                
                            
                        </tbody>
                    </table>
                </SimpleBar>
            </div>
                
        );
    }
}

export default connect(state=>({theme:state.theme}))(Read);