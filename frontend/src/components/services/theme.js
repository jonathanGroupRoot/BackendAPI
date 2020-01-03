import {createStore} from 'redux';

const state = {
    theme:{
        themeMode: 0,
        bgcolor: '#dfe6e9',
        bggood: '#0984e3',
        color: "#2d3436",
        goodcolor: '#dfe6e9',
    },

}

function reducer(initialState = state,action){
    if(action.type === 'Alterar tema'){
        return {
            themeMode:1,
            theme:{
                bgcolor:"#2d3436",
                bggood: "#212121",
                color: "#dfe6e9",
                goodcolor: '#dfe6e9'
            },
        };
    }else{
        return initialState;
    }
}


const store = createStore(reducer);

export default store;