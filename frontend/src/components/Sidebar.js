import React from 'react'
import { useState, useEffect } from 'react';
import { SITEMETA_ENDPOINT } from '../constants';

const Sidebar = () => {

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
            <h1 className="h4 blogtitle"><a href={sitemeta.home_url}>{sitemeta.site_name}</a></h1>
                <p>Latest post:<br />
                <a href={sitemeta.latest_post_url}>{sitemeta.latest_post_title}</a>
                </p>
              <br />
              <small><a href={sitemeta.privacy_policy_page_url}>Privacy Policy</a></small>
        </div>
      );
    }
}

export default Sidebar