import React from 'react'

const Postcard = (props) => {
  return (
      <div className="row p-2">
          <div className="col-md-8 mx-auto pb-3 container-PostList-post">
              <div className="pb-3">
                  <h1><a className="h4" href="/{props.post.post_name}">{props.post.post_title}</a></h1>
                  <p><em>{props.post.post_date}</em></p>
                  <p><em>By {props.post.post_author}</em></p>
              </div>
              <div>
                <p><em>{props.post.post_contents}</em></p>
              </div>
              <a className="h4" href="/{props.post.post_name}">View Post</a>
          </div>
      </div>
  )
}

export default Postcard