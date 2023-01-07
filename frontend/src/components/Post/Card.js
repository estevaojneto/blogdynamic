import Header from './Header'
import Link from './Link'

const Card = ({post, setColumnContents}) => {
  return (
      <div className="row p-2">
          <div className="col-md-8 mx-auto pb-3 container-PostList-post">
            <Header post={post} setColumnContents={setColumnContents}></Header>
              <div dangerouslySetInnerHTML={{__html: post.excerpt}}>
              </div>
              <Link setColumnContents={setColumnContents} classes={"h4"} slug={post.name} text={"Read More"}></Link>
          </div>
      </div>
  )
}

export default Card