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
        if(action.themeMode === 0){
            return {
                theme:{
                    themeMode:1,
                    bgcolor:"#333",
                    bggood: "#222",
                    color: "#dfe6e9",
                    goodcolor: '#dfe6e9'
                },
            };
        }else{
            return {
                theme:{
                    themeMode: 0,
                    bgcolor: '#dfe6e9',
                    bggood: '#0984e3',
                    color: "#2d3436",
                    goodcolor: '#dfe6e9',
                },
            }
        }
        
    }else{
        return initialState;
    }
}


const store = createStore(reducer);

export default store;