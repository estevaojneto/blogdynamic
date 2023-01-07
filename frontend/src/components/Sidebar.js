import React from 'react'

const Sidebar = () => {
  return (
                <div className="left-column-contents w-75">
                <h1 className="h4 blogtitle"><a href="<?= home_url(); ?>">Blogname</a></h1>
                    <p>Latest post:
                    <a href="#">Latest</a>
                    </p>
            <small><a href="<?= get_privacy_policy_url() ?>">Privacy Policy</a></small>
            <div className="searchbox-container">
            </div>
            <div className="history-browser">                     
            </div>
        </div>
  )
}

export default Sidebar