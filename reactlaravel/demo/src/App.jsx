import Header from "./componets/layout/Header";
import UserCard from "./componets/feature/UserCard";
import Button from "./componets/ui/Button";
import Counter from "./componets/feature/Counter";
import Post from "./componets/feature/Post";
function App() {
  const name = "chamod mullegama";
  const tp = "0702740542";

  user = {
    name: "chamod mullegama",
    tp: "0702740542",
  };

  function clickHandler() {
    alert("Button clicked!");
  }

  return (
    <div className="app">
      <Header />
      <UserCard name="chamod mullegama" tp="0702740542" />
      <UserCard name={name} tp={tp} />
      <UserCard name={user.name} tp={user.tp} />
      <Button clickHandler={clickHandler} />
      <Counter/>
      <Post/>
    </div>
  );
}

export default App;
