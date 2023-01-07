import React from 'react'
import Link from './Link'

const View = (props) => {
  return (
    <div className="container lh-lg overflow-auto h-100">
        <div className="col-md-8 mx-auto pb-4">
            <Link setColumnContents={props.setColumnContents} size={"h4"} slug={""} text={"<<"}></Link>
            <div className="pb-4">
                <h2>{props.post.title}</h2>
                <p><em>{props.post.dame_gmt}</em></p>
                <p><em>By {props.post.author}</em></p>
            </div>
            <div>
                {props.post.contents}
            </div>
            <hr />
            <div className="row mx-auto pb-4 text-center">
                <div className="col-sm-4">
                    <span className="h5">
                        <a class="text-left" href="#">&lt;&lt; Previous post</a>
                    </span>
                </div>
                <div className="col-sm-4">
                    <span className="h5">
                        <a class="text-center" href="#">[ / ] Home</a>
                    </span>
                </div>
                <div className="col-sm-4">
                    <span className="h5">
                        <a class="text-right" href="#">&gt;&gt; Next post</a>
                    </span>
                </div>
            </div>
    </div>
    </div>
  )
}

export default View