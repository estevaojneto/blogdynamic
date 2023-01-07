import React from 'react'
import { useState, useEffect } from 'react'
import { POST_BY_SLUG_ENDPOINT } from '../../constants'
import View from './View'
import Card from './Card'


const Link = ({size, slug, text, setColumnContents}) => {
    const [isLoaded, setIsLoaded] = useState(false)
    const [error, setError] = useState(null)

function Navigate (setColumnContents, slug) {
        fetch(POST_BY_SLUG_ENDPOINT+slug)
        .then(res => res.json())
          .then(
            (result) => {
                setIsLoaded(true)
                if ((result.posts.length) > 1) {
                setColumnContents(result.posts.map(post => (
                    <Card key={post.name} post={post} setColumnContents={setColumnContents} />
                )));
            } else {
                setColumnContents(<View post={result.posts[0]} setColumnContents={setColumnContents}></View>)
            }
            },
            (error) => {
              setIsLoaded(true)
              setError(error)
            }
          );
    return false
}
  return (
    <a onMouseDown={ () => {Navigate(setColumnContents, slug)} } className={size} href={slug}>{text}</a>
  )
}

export default Link