import Axios from 'axios';

const API = Axios.create({baseURL: 'https://api-backend-lumen.herokuapp.com',
crossDomain: true,
headers:{
    Accept: 'application/json',
    'Content-Type': 'application/json',
}
});

export default API;