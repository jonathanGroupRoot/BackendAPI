import React from 'react';
import {Link} from 'react-router-dom';
import {connect} from 'react-redux';
import './index.scss';
function fun(){
    return {
        type:'Alterar tema',
    }
}
const menu = ({theme,dispatch})=>{
        return(
            <div className='menu-main' style={({backgroundColor:theme.bggood})}>
                <div>
                    <Link className='LINK' to='/' style={({color:theme.goodcolor})}>HOME</Link>  
                    <Link className='LINK' to='/create' style={({color:theme.goodcolor})}>ADD</Link>
                </div>
                <div>
                    <a style={({color:theme.goodcolor})} onClick={()=>dispatch(fun())}>Alterar tema</a>
                </div>  
            </div>
        );
}

export default connect(state=>({theme:state.theme}))(menu);