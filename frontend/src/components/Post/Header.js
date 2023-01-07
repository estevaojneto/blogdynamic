import React from 'react'

const Header = (props) => {
  return (
    <div className="pb-3">
        <h1><a className="h4" href="/{props.link}">{props.title}</a></h1>
        <p><em>{props.date}</em></p>
        <p><em>By {props.author}</em></p>
    </div>
  )
}

export default Header