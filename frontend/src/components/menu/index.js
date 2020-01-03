import React from 'react';
import {Link} from 'react-router-dom';
export default class Menu extends React.Component{
    render(){
        return(
            <div>
                <Link to='/'>HOME</Link>    
                <Link to='/create'>ADD</Link>  
            </div>
        );
    }
}