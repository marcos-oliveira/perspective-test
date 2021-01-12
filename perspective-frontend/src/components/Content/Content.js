import React from 'react';
import classes from './Content.css';

const Content = props =>  {
    <div className={classes.Content}>
        {props.children}
    </div>
}
export default Content; 