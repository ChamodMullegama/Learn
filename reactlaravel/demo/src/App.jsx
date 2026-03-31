import { useState } from "react";
import Registation from "./componets/feature/Registation";
import Login from "./componets/feature/Login";
import Dashboard from "./componets/feature/Dashboard";
import { Route } from "react-router";
import ProtecedRoutes from "./routes/ProtecedRoutes";

function App() {

  const [showLogin, setshowLogin] = useState(false);
  const [page, setPage] = useState(localStorage.getItem('token') ? "dashboard" : "login");

  return (

    <Routes>
      <Route path="/register" element={<Registation/>} />
      <Route path="/login" element={<Login/>} />
      <Route element={<ProtecedRoutes/>}>
             <Route path="/dashboard" element={<Dashboard />} />
      </Route>
    
    </Routes>

    // <div className="text-center">

    //   {/* {showLogin ? <Login /> : <Registation />} */}

    //   {page == "register" && <Registation setPage={setPage} />}
    //   {page == "login" && <Login setPage={setPage} />}
    //   {page == "dashboard" && <Dashboard setPage={setPage} />}

    //   {page === "register" || page === "login" ? (
    //     <>
    //       {page === "login" ? (
    //         <>
    //           <p>Do not have an account?</p>
    //           <button onClick={() => setPage("register")}>Register</button>
    //         </>
    //       ) : (
    //         <>
    //           <p>Already have an account?</p>
    //           <button onClick={() => setPage("login")}>Login</button>
    //         </>
    //       )}
    //     </>
    //   ) : null}

    // </div>
  );
}

export default App;