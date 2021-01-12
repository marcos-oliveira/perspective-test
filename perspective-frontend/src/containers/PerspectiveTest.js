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

  const [ questions, setQuestions ] = useState();
  const [ msg, setMsg ] = useState();
  const [ error, setError ] = useState();
  const [ running, setRunning ] = useState(false);
  const classes = useStyles();

  const fetchQuestions = useCallback(() => {
    setRunning(true);
    setError(null);
    fetch('http://perspective.localhost/api/questions')
      .then( response => {
        if (!response.ok) { throw response };
        return response.json();
      })
      .then( data => {
        setRunning(false);
        console.log(data);
        // setQuestions(data);
      } )
      .catch( error => {
        setRunning(false);
        setError("Sorry, an unexpected error occurred");
      } );
  }, [setRunning, setQuestions, setError]);

  useEffect(() => {
    fetchQuestions();
  }, [fetchQuestions]);

  const save = useCallback(() => {
    setError(null);
    const formData = new FormData();
    formData.append('email', answers.email);
    // answered = answers.questions.map(element => {
    //   'quiz_id': element.quiz_id
    // });
    formData.append('answers', answers.questions);
    console.log(formData);
    fetch('http://perspective.localhost/api/quiz', {
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
        setError("Sorry, an unexpected error occurred");
      } );
  }, [setResult, setError]);

  const handleClose = useCallback((event, reason) => {
    if (reason === 'clickaway') {
      return;
    }

    setError(null);
    setMsg(null);
  }, [setError, setMsg]);

  if(running){
    return <Box height="100%" display="flex" width="100%" bgcolor="grey.100"><Box m="auto"><CircularProgress/></Box></Box>;
  }

  let alert = null;
  if(error){
    alert = <div className={classes.root}>
    <Snackbar open={error} autoHideDuration={6000} onClose={handleClose}>
        <Alert onClose={handleClose} severity="error">
          {error}
        </Alert>
      </Snackbar>
      </div>
  }
  return <Content>
    <Title />
    <Survey questions={questions} save={save} setQuestions={setQuestions} />
    {alert}
  </Content>;
}


export default OnlineEditor;