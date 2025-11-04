import React, { useState } from 'react'

const Counter = () => {

   const [Counter,setCount] =  useState(0)

  return (
    <div>
        <p>
            you clicked {Counter} this
        </p>
        <button onClick={() =>setCount(Counter+1)}>+ </button>
                <button onClick={() =>setCount(Counter-1)}>- </button>
    </div>
  )
}

export default Counter