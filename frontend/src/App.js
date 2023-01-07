import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import RightColumn from './components/RightColumn';
import LeftColumn from './components/LeftColumn';

function App() {
  return (
    <main>
      <div className="container-full">
        <div className="row main-row">
          <LeftColumn />
          <RightColumn />
        </div>
      </div>
    </main>
  );
}

export default App;
