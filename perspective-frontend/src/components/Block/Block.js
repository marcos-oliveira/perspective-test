import React from 'react';
import classes from './Block.css';

const Block = props =>  {
    return <div className={classes.Block}>
        {props.children}
    </div>;
}
export default Block; 