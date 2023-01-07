import ColumnContents from './ColumnContents'
import Sidebar from './Sidebar'

const LeftColumn = ({setColumnContents}) => {
  let columnContents = <Sidebar setColumnContents={setColumnContents} />;
  return (
    <div className="col-sm-3 left-column align-content-center" data-function="sidebar">
      <ColumnContents columnContents={columnContents}/>
    </div>
  )
}

export default LeftColumn