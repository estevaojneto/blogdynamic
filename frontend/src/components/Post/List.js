import React from 'react'
import Card from './Card'
import { useState, useEffect } from 'react'
import { POSTS_ENDPOINT } from '../../constants';

const List = () => {
    const [error, setError] = useState(null);
    const [isLoaded, setIsLoaded] = useState(false);
    const [posts, setPosts] = useState([]);
  
    useEffect(() => {
      fetch(POSTS_ENDPOINT)
        .then(res => res.json())
        .then(
          (result) => {
            setIsLoaded(true);
            setPosts(result.posts);
          },
          (error) => {
            setIsLoaded(true);
            setError(error);
          }
        )
    }, [])
    if (error) {
        return <div>Error: {error.message}</div>;
      } else if (!isLoaded) {
        return <div>Loading...</div>;
      } else {
        return (
            <div>
            {posts.map(post => (
                <Card key={post.name} post={post} />
            ))}
            </div>
        );
      }
}

export default List