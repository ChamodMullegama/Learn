import React from 'react'

const UseStatus = (props) => {
  if(props.islog && props.isadmin){
       return <h1>admin</h1>
  }else{
       return <h1>normal user</h1>
  }
}

export default UseStatus