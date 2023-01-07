import React from 'react'
import Header from './Header'

const Card = (props) => {
  return (
      <div className="row p-2">
          <div className="col-md-8 mx-auto pb-3 container-PostList-post">
            <Header title={props.post.post_title} link={props.post.post_name} author={props.post.post_author} date={props.post.post_date}></Header>
              <div>
                <p><em>{props.post.post_contents}</em></p>
              </div>
              <a className="h4" href="/{props.post.post_name}">View Post</a>
          </div>
      </div>
  )
}

export default Card