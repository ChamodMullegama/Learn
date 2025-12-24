import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import Counter from './components/feature/Counter'
import Post from './components/feature/Post'
import Registration from './components/feature/Reagistation'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
      {/* <Counter/>
      <Post/> */}
      <Registration/>

    </>
  )
}

export default App
