import React, { useState, useEffect, useCallback } from 'react';
import Content from '../components/Content/Content';
import Title from '../components/Title/Title';
import Survey from '../components/Survey/Survey';
import { CircularProgress, Box, Snackbar } from '@material-ui/core';
import MuiAlert from '@material-ui/lab/Alert';
import { makeStyles } from '@material-ui/core/styles';

function Alert(props) {
  return <MuiAlert elevation={6} variant="filled" {...props} />;
}

const useStyles = makeStyles((theme) => ({
  root: {
    width: '100%',
    '& > * + *': {
      marginTop: theme.spacing(2),
    },
  },
}));

const PerspectiveTest = props => {

  const [ answers, setAnswers ] = useState();
  const [ error, setError ] = useState();
  const [ running, setRunning ] = useState(false);
  const {setResult} = props;
  const classes = useStyles();

  const fetchQuestions = useCallback(() => {
    setRunning(true);
    setError(null);
    fetch('http://perspective.shift/api/questions', {
      headers : { 
        "access-control-allow-origin" : "*",
        'Content-Type': 'application/json',
        'Accept': 'application/json'
       }

    })
      .then( response => {
        if (!response.ok) { throw response };
        return response.json();
      })
      .then( data => {
        setRunning(false);
        let questions_answers = {email:'', questions: data.map(el => ({
          'question_id':el.id,
          'description':el.description,
          'answer': null
        }))};
        setAnswers(questions_answers);
      } )
      .catch( error => {
        setRunning(false);
        setError("Sorry, an unexpected error occurred");
      } );
  }, [setRunning, setAnswers, setError]);

  useEffect(() => {
    fetchQuestions();
  }, [fetchQuestions]);

  const save = useCallback(() => {
    setError(null);
    const formData = new FormData();
    formData.append('email', answers.email);
    answers.questions.forEach((element, i) => {
      formData.append(`answers[${i}][question_id]`, element.question_id);
      formData.append(`answers[${i}][answer]`, element.answer);
    });
    fetch('http://perspective.shift/api/quiz', {
      method: 'POST',
      body: formData
    })
      .then( response => {
        if (!response.ok) { throw response };
        return response.json();
      })
      .then( dados => {
        setResult(dados);
      } )
      .catch( error => {
          error.json()
        .then(error_msg =>{
          setError(error_msg.message);
          }
        ).catch(error => {
          setError("Sorry, an unexpected error occurred");
        } )
      } );
  }, [setResult, setError, answers]);

  const handleClose = useCallback((event, reason) => {
    if (reason === 'clickaway') {
      return;
    }

    setError(null);
  }, [setError]);

  if(running){
    return <Box height="100%" display="flex" width="100%" bgcolor="grey.100"><Box m="auto"><CircularProgress/></Box></Box>;
  }

  let alert = null;
  if(error){
    alert = <div className={classes.root}>
    <Snackbar open={error?true:false} autoHideDuration={6000} onClose={handleClose}>
        <Alert onClose={handleClose} severity="error">
          {error}
        </Alert>
      </Snackbar>
      </div>
  }
  let c =  <Content>
    <Title />
    <Survey answers={answers} save={save} setAnswers={setAnswers} />
    {alert}
  </Content>;
  return c;
}


export default PerspectiveTest;