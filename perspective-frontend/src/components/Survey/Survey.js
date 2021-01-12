import React from 'react';
import classes from './Survey.css';

const Survey = props =>  {
    <div className={classes.Survey}>
        {props.children}
    </div>
}
export default Survey; 