import React from 'react';
import {connect} from 'react-redux';
// import API from '../services/API.js';
import './style.scss';

const Read = ({theme})=>{
        const themeChanged = theme;
        return(
            <div className='read-main' style={({backgroundColor:themeChanged.bgcolor})}>
                
                <h3 style={({color:themeChanged.color})}>Lista de pessoas</h3>
                <div className='read-table'>
                    <table>
                        <thead>
                            <tr style={({backgroundColor:themeChanged.bggood})}>
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
                </div>
            </div>
                
        );
}

export default connect(state=>({theme:state.theme}))(Read);