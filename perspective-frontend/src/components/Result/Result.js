import React from 'react';
import Dimension from './Dimension/Dimension';
import classes from './result.module.css';

const Result = props =>  {
    return <div className={classes.Result}>
    <div className={classes.Block1}>
        <div className={classes.Titleresult}>Your Perspective</div>
        <div className={classes.Textresult}>Your Perspective Type is {props.result.result}</div> 
    </div>
    <div className={classes.Block2}>
        {props.result.mbti.map(dimension => <Dimension key={dimension.left_initial} dimension={dimension} />)}
    </div>
  </div>;
}
export default Result; 