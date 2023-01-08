import { useState } from 'react'
import { POST_BY_SLUG_ENDPOINT } from '../../constants'
import View from './View'
import Card from './Card'
import { SITENAME_TITLE } from '../../baseConstants'
import { Helmet } from "react-helmet"

const title = <Helmet>
  <title>{SITENAME_TITLE}</title>
</Helmet>

const Link = ({classes, slug, text, setColumnContents}) => {
    const [isLoaded, setIsLoaded] = useState(false)
    const [error, setError] = useState(null)
    const Navigate = (setColumnContents, slug) => {
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
    <a onClick={ (e) => {e.preventDefault(); Navigate(setColumnContents, slug); return title; } } className={classes} href={slug}>{text}</a>
  )
}

export default Link