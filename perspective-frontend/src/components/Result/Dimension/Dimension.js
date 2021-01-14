import React from 'react';
import classes from './dimension.module.css';

const Dimension = props =>  {
    let {dimension} = props;
    console.log(dimension);
    return <div className={classes.row}>
        <div className={classes.label+' '+classes.block_info}>{dimension.left_description+` (${dimension.left_initial})`}</div>
        {dimension.score<=0?<div className={classes.active+' '+classes.block_info}/>:<div className={classes.inactive+' '+classes.block_info}/>}
        {dimension.score>0?<div className={classes.active+' '+classes.block_info}/>:<div className={classes.inactive+' '+classes.block_info}/>}
        <div className={classes.label+' '+classes.labelleft+' '+classes.block_info}>{dimension.right_description+` (${dimension.right_initial})`}</div>
    </div>;
}
export default Dimension; 