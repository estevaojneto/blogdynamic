import ColumnContents from './ColumnContents'

const RightColumn = ({columnContents}) => {
  return (
    <div className="col-sm-9 right-column h-100">
        <ColumnContents columnContents={columnContents}/>
    </div>
  )
}

export default RightColumn