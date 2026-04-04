import React from 'react'
import { useParams } from 'react-router'

const Profile = () => {
const { user, loading, error } = useOutletContext();

  return (
    <div className='max-w-x-l bg-white shadow rounded p-6'>
      <h2 className='text-xl font-semibold mb-4'>My Profile</h2>
      <div className='space-y-4'>
        <div>
          <p className='text-gray-700 text-sm'>Name</p>
           <p className='text-gray-700 text-sm'>{user.name}</p>
        </div>
          <div>
          <p className='text-gray-700 text-sm'>Email</p>
           <p className='text-gray-700 text-sm'>{user.email}</p>
        </div>
          <div>
          <p className='text-gray-700 text-sm'>Account created Date</p>
           <p className='text-gray-700 text-sm'>{new Date(user.created_at).toLocaleDateString()}</p>
        </div>
      </div>
    
    </div>
  )
}

export default Profile