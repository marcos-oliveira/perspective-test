import React from 'react';
import classes from './title.module.css';

const Title = props =>  {
    return <div className={classes.Title}>
        <div className={classes.Titledoc}>Discover Your Perspective</div>
        <div className={classes.Textdoc}>Complete the 7 min test and get a Detailed report of your lenses on the world</div>   
    </div>;
}
export default Title; 