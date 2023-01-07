import React from 'react'
import Header from './Header'

const Card = (props) => {
  return (
      <div className="row p-2">
          <div className="col-md-8 mx-auto pb-3 container-PostList-post">
            <Header post={props.post}></Header>
              <div>
                <p><em>{props.post.contents}</em></p>
              </div>
              <a className="h4" href={props.post.name}>View Post</a>
          </div>
      </div>
  )
}

export default Card