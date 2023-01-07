import React from 'react'
import ColumnContents from './Post/ColumnContents'
import { useState, useEffect } from 'react'
import { POSTS_ENDPOINT } from '../constants'
import Card from './Post/Card'

const RightColumn = () => {
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
    <div className="col-sm-9 right-column">
        <ColumnContents columnContents={columnContents}/>
    </div>
  )
}

export default RightColumn