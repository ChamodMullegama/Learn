import { useState } from "react";
import Registation from "./componets/feature/Registation";
import Login from "./componets/feature/Login";

function App() {

  const [showLogin, setshowLogin] = useState(false);

  return (
    <div className="text-center">

      {showLogin ? <Login /> : <Registation />}

      {showLogin ? (
        <>
          <p>Do not have an account?</p>
          <button onClick={() => setshowLogin(false)}>Register</button>
        </>
      ) : (
        <>
          <p>Already have an account?</p>
          <button onClick={() => setshowLogin(true)}>Login</button>
        </>
      )}

    </div>
  );
}

export default App;