import React from 'react';
import classes from './Dimension.css';

const Dimension = props =>  {
    let {dimension} = props;
    return <div className={classes.row}>
        <div className={classes.label}>{dimension.left_description+` (${dimension.left_initial})`}</div>
        {dimension.score<=0?<div className={classes.active}/>:<div className={classes.inactive}/>}
        {dimension.score>0?<div className={classes.active}/>:<div className={classes.inactive}/>}
        <div className={classes.label}>{dimension.right_description+` (${dimension.right_initial})`}</div>
    </div>;
}
export default Dimension; 