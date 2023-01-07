import { useState, useEffect } from 'react';
import { SITEMETA_ENDPOINT } from '../constants';
import Link from './Post/Link';

const Sidebar = ({setColumnContents}) => {
  const [error, setError] = useState(null);
  const [isLoaded, setIsLoaded] = useState(false);
  const [sitemeta, setSitemeta] = useState([]);

  useEffect(() => {
    fetch(SITEMETA_ENDPOINT)
      .then(res => res.json())
      .then(
        (result) => {
          setIsLoaded(true);
          setSitemeta(result);
        },
        (error) => {
          setIsLoaded(true);
          setError(error);
        }
      )
  }, [])
  if (error) {
      return <div>Error: {error.message}</div>;
    } else if (!isLoaded) {
      return <div>Loading...</div>;
    } else {
      return (
        <div className="left-column-contents w-75">
          <h1 className="blogtitle"><Link setColumnContents={setColumnContents} classes={"h4"} slug={""} text={sitemeta.site_name}></Link></h1>
            <p>Latest post:<br />
              <Link setColumnContents={setColumnContents} classes={""} slug={sitemeta.latest_post_slug} text={sitemeta.latest_post_title}></Link>
            </p>
            <small><Link setColumnContents={setColumnContents} classes={""} slug={""} text={"Privacy Policy"}></Link></small>
        </div>
      );
    }
}

export default Sidebar