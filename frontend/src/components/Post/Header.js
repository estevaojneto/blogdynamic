import React from 'react'

const Header = (props) => {
  let humanDate = (new Date(props.post.date_gmt*1000)).toLocaleString();
  return (
    <div className="pb-3">
        <h1><a className="h4" href={props.post.name}>{props.post.title}</a></h1>
        <p><em>{humanDate}</em></p>
        <p><em>By {props.post.author}</em></p>
    </div>
  )
}

export default Header