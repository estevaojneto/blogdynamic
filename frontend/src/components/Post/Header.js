import Link from './Link'

const Header = ({post, setColumnContents}) => {
  let humanDate = (new Date(post.date_gmt*1000)).toLocaleString();
  return (
    <div className="pb-3">
        <h1><Link setColumnContents={setColumnContents} classes={"h4"} slug={post.name} text={post.title}></Link></h1>
        <p><em>{humanDate}</em></p>
        <p><em>By {post.author}</em></p>
    </div>
  )
}

export default Header