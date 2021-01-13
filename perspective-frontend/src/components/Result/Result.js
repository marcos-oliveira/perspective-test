import React from 'react';
import Dimension from './Dimension/Dimension';
import classes from './Result.css';

const Result = props =>  {
    return <div className={classes.Result}>
    <div className={classes.Block}>
        <div className={classes.Titleresult}>Your Perspective</div>
        <div className={classes.Textresult}>Your Perspective Type is {props.result.result}</div> 
    </div>
    <div className={classes.Block}>
        {props.result.mbti.map(dimension => <Dimension dimension={dimension} />)}
    </div>
  </div>;
}
export default Result; 