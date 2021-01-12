import React, { useState, useEffect, useCallback } from 'react';
import PerspectiveTest from './containers/PerspectiveTest';
import PerspectiveResult from './containers/PerspectiveResult';

const PerspectiveTest = props => {
  const [ result, setResult ] = useState();
  if(result){
    <PerspectiveResult result={result} />
  }else{
    <PerspectiveTest setResult={setResult} />
  }
}

export default App;
