import React, { useCallback } from 'react';
import classes from './survey.module.css';

const Survey = props =>  {
    const {answers, setAnswers, save}  = props;

    const changeEmail = useCallback((value) => {
        setAnswers({...answers, email: value});
    }, [answers, setAnswers]);

    const changeAnswer = useCallback((question_id, value) => {
        let new_questions = answers.questions.map(question => {
            if(question.question_id === question_id){
                return {...question, answer:value};
            }
            return question;
        });
        setAnswers({email:answers.email, questions: new_questions});
    }, [answers, setAnswers]);

    let questions = null;
    if(answers && answers.questions){
        questions = answers.questions.map(el => (
            <div key={'question'+el.question_id} className={classes.block}>
                <div className={classes.question}>
                {el.description}
                </div>
                <div className={classes.field}>
                    <div className={classes.disagree+" "+classes.field_label}>Disagree</div>
                <div className={classes.radios}>
                    {[1,2,3,4,5,6,7].map(value => (
                        <input key={el.question_id+'-'+value} type="radio" name={'question_'+el.question_id} value={value} onChange={() => changeAnswer(el.question_id, value)}  />
                    ))}
                    </div>
                    <div className={classes.agree+" "+classes.field_label}>Agree</div>
                </div>
            </div>
        ))
    }
    return <div className={classes.Survey}>
        {questions}
        <div className={classes.block}>
            <div className={classes.question}>
            Your Email
            </div>
            <div className={classes.field}>
            <input type='text' className={classes.email} placeholder="you@example.com" onChange={(e) => changeEmail(e.target.value)} />
            </div>
        </div>
        <div className={classes.block_btn}>
            <input type="button" class={classes.btn} value="Save & Continue" onClick={save} />
        </div>
    </div>;
}
export default Survey; 