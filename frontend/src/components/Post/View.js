import Link from './Link'

const View = (props) => {
   return (
    <div className="container lh-lg overflow-auto">
        <div className="col-md-8 mx-auto pb-4">
            <Link setColumnContents={props.setColumnContents} classes={"h4"} slug={""} text={"<<"}></Link>
            <div className="pb-4">
                <h2>{props.post.title}</h2>
                <p><em>{props.post.dame_gmt}</em></p>
                <p><em>By {props.post.author}</em></p>
            </div>
            <div dangerouslySetInnerHTML={{__html: props.post.contents}}>
            </div>
            <hr />
            <div className="row mx-auto pb-4 text-center">
                <div className="col-sm-4">
                    <span className="h5">
                        <Link setColumnContents={props.setColumnContents} classes={"h4"} slug={props.post.previous_post} text={"<< Previous post"}></Link>
                    </span>
                </div>
                <div className="col-sm-4">
                    <span className="h5">
                        <Link setColumnContents={props.setColumnContents} classes={"h4"} slug={""} text={"[ / ] Home"}></Link>
                    </span>
                </div>
                <div className="col-sm-4">
                    <span className="h5">
                        <Link setColumnContents={props.setColumnContents} classes={"h4"} slug={props.post.next_post} text={">> Next post"}></Link>
                    </span>
                </div>
            </div>
    </div>
    </div>
  )
}

export default View