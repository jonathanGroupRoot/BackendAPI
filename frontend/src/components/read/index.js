import React from 'react';
import SimpleBar from 'simplebar-react';
import 'simplebar/dist/simplebar.min.css';
import {connect} from 'react-redux';
import {Link} from 'react-router-dom';
// import API from '../services/API.js';
import './style.scss';

class Read extends React.Component{
    state = {
        PopopDelete:'unwork',
    }

    popopController = (id)=>{
        this.setState({PopopDelete:"delete"});
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
                        <button className='first-btn-delete'>APAGAR</button>
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
                            <tr>
                                <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color,textDecoration:'none',whiteSpace:'nowrap',})}>
                                    <b style={({color:"#d63031",textDecoration:'none'})} onClick={()=>this.popopController(1)} className='link'>DELETAR </b> 
                                     | 
                                    <b><Link to='/update' style={({color:'#0984e3',textDecoration:'none'})}> ALTERAR</Link></b>
                                </td>
                                <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>JULIO</td>
                                <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>JULIO</td>
                                <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>JULIO</td>
                                <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>JULIO</td>
                                <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>JULIO</td>
                                <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>JULIO</td>
                                <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>JULIO</td>
                                <td style={({color:themeChanged.color,borderBottom: "1px solid "+themeChanged.color})}>JULIO</td>
                            </tr>
                        </tbody>
                    </table>
                </SimpleBar>
            </div>
                
        );
    }
}

export default connect(state=>({theme:state.theme}))(Read);