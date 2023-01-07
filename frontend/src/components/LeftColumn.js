import React from 'react'
import Sidebar from './Sidebar'

const LeftColumn = () => {
  return (
    <div className="col-sm-3 left-column align-content-center" data-function="sidebar">
      <Sidebar />
    </div>
  )
}

export default LeftColumn