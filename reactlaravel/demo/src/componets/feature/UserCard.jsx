import React from 'react'

const UserCard = ({name="akkuwa", tp="unknown"}) => {
  return (
    <div>
        <ol>
            <li>Name : {name}</li>
            <li>Telephone : {tp}</li>
        </ol>
    </div>
  )
}

export default UserCard