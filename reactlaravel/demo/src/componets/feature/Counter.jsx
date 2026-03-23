import React from 'react'
import { useState } from 'react'

const [count, setCount] = useState(12);


const Increment =() =>{
  setCount(count+1)
}


const Counter = () => {
  return (
    <div>
        <h1>counter:{count}</h1>
        <button onClick={Increment}>Increment</button>
    </div>
  )
}

export default Counter