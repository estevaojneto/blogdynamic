import 'bootstrap/dist/css/bootstrap.min.css';
import './App.scss';
import RightColumn from './components/RightColumn';
import LeftColumn from './components/LeftColumn';
import Card from './components/Post/Card';
import { useState, useEffect } from 'react'
import { POSTS_ENDPOINT } from './constants'
import { SITENAME_TITLE } from './baseConstants';
import { Helmet } from "react-helmet"

function App() {

  const [error, setError] = useState(null);
  const [isLoaded, setIsLoaded] = useState(false);
  const [columnContents, setColumnContents] = useState([]);
  useEffect(() => {
    fetch(POSTS_ENDPOINT)
      .then(res => res.json())
      .then(
        (result) => {
          setIsLoaded(true);
          setColumnContents(result.posts.map(post => (
            <Card key={post.name} post={post} setColumnContents={setColumnContents} />
          )));
        },
        (error) => {
          setIsLoaded(true);
          setError(error);
        }
      )
  }, [])
  return (
    <main className="h-100">
      <Helmet>
        <title>{SITENAME_TITLE}</title>
      </Helmet>
      <div className="container-full">
        <div className="row main-row h-100">
          <LeftColumn setColumnContents={setColumnContents} />
          <RightColumn columnContents={columnContents} />
        </div>
      </div>
    </main>
  );
}

export default App;
