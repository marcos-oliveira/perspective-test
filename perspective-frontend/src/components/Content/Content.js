import React from 'react';
import classes from './content.module.css';

const Content = props =>  {
    return <div className={classes.Content}>
        {props.children}
    </div>;
}
export default Content; 