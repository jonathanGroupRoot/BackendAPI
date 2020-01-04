import React from 'react';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import {Provider} from 'react-redux';
import store from './components/services/theme';
import Menu from './components/menu';
import Read from './components/read';


function App() {
  
  return (
    <BrowserRouter>
    <Provider store={store}>
      <Switch>
        <Route path='/' component={Menu} />
      </Switch>
      <Switch>
        
          <Route exact path='/' component={Read} />
        
      </Switch>
    </Provider>
    </BrowserRouter>
  );

}

export default App;
