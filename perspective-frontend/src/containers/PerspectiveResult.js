import React from 'react';
import Content from '../components/Content/Content';
import Result from '../components/Result/Result';


const PerspectiveResult = props => {

  return <Content>
        <Result {...props} />
    </Content>;
}


export default PerspectiveResult;