import React,{useCallback} from 'react';
import classes from './Survey.css';

const Survey = props =>  {
    const {answers, setAnswers, save}  = props;

    const changeEmail = useCallback((value) => {
        setAnswers({...answers, email: value});
    }, [answers, setAnswers]);

    const changeAnswer = useCallback((question_id, value) => {
        let new_questions = answers.questions.map(question => {
            if(question.question_id === question_id){
                return {...question, value:value};
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
                    <div className={classes.agree}></div>
                    {[1,2,3,4,5,6,7].map(value => (
                        <input key={el.question_id+'-'+value} type="radio" name={'question_'+el.question_id} value={value} onChange={() => changeAnswer(el.question_id, value)}  />
                    ))}
                    <div className={classes.agree}></div>
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
            <input type='text' onChange={(e) => changeEmail(e.target.value)} />
            </div>
        </div>
        <div className={classes.block}>
            <input type="button" value="Save & Continue" onClick={save} />
        </div>
    </div>;
}
export default Survey; 