import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import RightColumn from './components/RightColumn';
import LeftColumn from './components/LeftColumn';

function App() {
  return (
    <main>
      <div class="container-full">
        <div class="row main-row">
          <RightColumn />
          <LeftColumn />
        </div>
      </div>
    </main>
  );
}

export default App;
