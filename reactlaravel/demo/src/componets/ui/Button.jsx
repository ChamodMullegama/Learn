import React from 'react'

const Button = ({label="Click me", clickHandler}) => {
  return (
  <button onClick={clickHandler}>{label}</button>
  )
}

export default Button