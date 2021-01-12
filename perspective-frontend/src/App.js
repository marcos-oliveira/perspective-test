import React, { useState } from 'react';
import PerspectiveTest from './containers/PerspectiveTest';
import PerspectiveResult from './containers/PerspectiveResult';
require('dotenv').config();

const App = props => {
  const [ result, setResult ] = useState();
  if(result){
    return <PerspectiveResult result={result} />
  }else{
    return <PerspectiveTest setResult={setResult} />
  }
}

export default App;
