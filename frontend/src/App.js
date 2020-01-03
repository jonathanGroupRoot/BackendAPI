import React from 'react';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import Menu from './components/menu';

function App() {
  
  return (
    <BrowserRouter>
      <Switch>
        <Route path='/' component={Menu} />
      </Switch>
    </BrowserRouter>
  );
}

export default App;
