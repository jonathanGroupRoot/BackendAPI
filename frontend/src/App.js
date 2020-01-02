import React from 'react';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import Menu from './components/menu';
import './App.css';

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
