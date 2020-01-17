import React from 'react';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import {Provider} from 'react-redux';
import store from './components/services/theme';
import Menu from './components/menu';
import Read from './components/read';
import Create from './components/create';
import update from './components/update';


function App() {
  
  return (
    <BrowserRouter>
    <Provider store={store}>
      <Switch>
        <Route exact path='/' component={Menu} />
        <Route exact path='/create' component={Menu} />
      </Switch>
      <Switch>
          <Route exact path='/' component={Read} />
          <Route path='/create' component={Create} />
          <Route path='/update/:id' component={update} />
      </Switch>
    </Provider>
    </BrowserRouter>
  );

}

export default App;
